<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Adocao;
use Illuminate\Support\Facades\DB;

class controladorAdocao extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $Adocao;
    private $total = 5;
    public function __construct(Adocao $Adocao)
    {
        $this->middleware('auth');
        $this->Adocao = $Adocao;
    }
    public function listarAdocaoPendentes()
    {
        $dados = $this->Adocao->with('tipo')->where('status', '=', 'N')->paginate($this->total);
        return view('sistema.Adocao', compact('dados'));
    }
    public function listarAdocaoConcluidas()
    {
        $dados = $this->Adocao->with('tipo')->where('status', '=', 'S')->paginate($this->total);
        return view('sistema.Adocao', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipo::all();
        return view('sistema.novaAdocao', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = new Adocao();
        $dados->descricaoAdocao = $request->input('descricaoAdocao');
        $dados->status = $request->input('status');
        $dados->tipo_id = $request->input('tipo');
        $dados->save();
        return redirect('\AdocaoPendentes')->with('success', 'Nova Adoção cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dados = Adocao::find($id);
        if(isset($dados)){
            $tipos = Tipo::all();
            $dados->tipos = $tipos;
            return view('sistema.editarAdocao', compact('dados'));
        }
        return redirect('\AdocaoPendentes')->with('danger', 'Adoção não encontrada.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dados = Adocao::find($id);
        if(isset($dados)){
            $dados = new Adocao();
            $dados->descricaoAdocao = $request->input('descricaoAdocao');
            $dados->status = $request->input('status');
            $dados->tipo_id = $request->input('tipo');
            $dados->save();
        }else{
            return redirect('/AdocaoPendentes')->with('danger', 'Erro ao tentar atualizar o cadastro. ');
        }
        return redirect('/AdocaoPendentes')->with('success', 'Cadastro atualizado com sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dados = Adocao::find($id);
        if (isset($dados)){
            $dados->delete();
        }else{
            return redirect('/AdocaoPendentes')->with('danger', 'Adoção não encontrada. ');
        }
        return redirect('/AdocaoPendentes')->with('success', 'Cadastro excluído com sucesso.');
        }

    public function pesquisarAdocao()
    {
        return view('sistema.pesquisarAdocao');
    }

    public function procurarAdocao(Request $request)
    {
        $descricao = $request->input('descricaoAdocao');
        $dados = DB::table('Adocao')->select('id', 'descricaoAdocao', 'status', 'tipo_id')
                                     ->where(DB::raw('lower(descricaoAdocao)'), 'like', '%'.
                                     strtolower($descricao).'%')->get();
        if(isset($dados)){
            foreach($dados as $item){
                $tipo = Tipo::find($item->tipo_id);
                $item->descricaoTipo = $tipo->descicaoTipo;
            }
            return view('sistema.exibirPesquisaAdocao', compact('dados'));
        }
        else 
            return redirect('/AdocaoPendentes')
            ->with('danger', 'Não foram encontrados registros com o termo pesquisado.');
    }
    }


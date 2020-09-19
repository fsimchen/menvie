<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Http\Requests\PessoaUpdateRequest;
use App\Http\Requests\PessoaStoreRequest;

class PessoasController extends Controller
{
    /**
     * Mostra a lista de Pessoas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoas.index', compact('pessoas'));
    }

    /**
     * Mostra o formulário para criação de nova Pessoa.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoas.create');
    }

    /**
     * Mostra o formulário para edição de uma Pessoa.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoas.edit', compact('pessoa'));
    }

    /**
     * Atualiza uma Pessoa no banco de dados.
     *
     * @param  PessoaUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaUpdateRequest $request, $id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->nome = $request['nome'];
        $pessoa->email = $request['email'];
        $pessoa->telefone = $request['telefone'];
        $pessoa->save();

        return redirect(route('pessoas.index'))->with(
            'success', 'Pessoa alterada com sucesso!'
        );
    }

    /**
     * Salva uma pessoa recém criada no banco de dados.
     *
     * @param  PessoaStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaStoreRequest $request)
    {
        $dados = $request->except(['_token']);
        Pessoa::create($dados);

        return redirect(route('pessoas.index'))->with(
            'success', 'Pessoa cadastrada com sucesso!'
        );
    }

    /**
     * Exclui Pessoa do banco de dados.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();

        return redirect(route('pessoas.index'))->with('success', 'Pessoa excluída com sucesso!');
    }
}

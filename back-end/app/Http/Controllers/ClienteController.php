<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    private $cliente;

    public function __construct(Cliente $cliente)
    {

        $this->Cliente = $cliente;

    }

    public function index()
    {
        $clientes = $this->Cliente->with('planos')->orderby('nome', 'asc')->get();
        return response()->json($clientes, 200);

    }

    public function store(Request $request)
    {
        $data = $request->json()->all();

        $validator = \Validator::make($data, [
            'nome' => 'required',
            'email' => 'required|email|unique:clientes',
            'contato' => 'required|max:11',
            'estado' => 'required|max:25',
            'cidade' => 'required|max:25',
            'data_nascimento' => 'required|max:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $insert = $this->Cliente->create($data);
            $cliente = $this->Cliente->find($insert['id']);
            $cliente->planos()->sync($data['planos']);
            if ($insert) {
                return response()->json(['status' => 'sucesso_salvar'], 200);
            } else {
                return response()->json(['status' => 'erro_salvar'], 200);
            }
        }

    }

    public function show($id)
    {
        $cliente = $this->Cliente->with('planos')->findOrFail($id);
        return response()->json($cliente, 200);
    }

    public function update(Request $request, $id)
    {
        $cliente = $this->Cliente->findOrFail($id);

        $newdata = $request->json()->all();

        $validator = \Validator::make($newdata, [
            'nome' => 'required',
            'email' => 'required',
            'contato' => 'required|max:11',
            'estado' => 'required|max:25',
            'cidade' => 'required|max:25',
            'data_nascimento' => 'required|max:8',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $update = $cliente->update($newdata);
            $cliente->planos()->detach();
            $cliente->planos()->sync($newdata['planos']);

            if ($update) {
                return response()->json(['status' => 'sucesso_update'], 200);
            } else {
                return response()->json(['status' => 'erro_update'], 200);
            }

        }

    }

    public function destroy($id)
    {
        $cliente = $this->Cliente->with('planos')->findOrFail($id);

        if ($cliente->verfica_estado($cliente, 'São Paulo') &&
            $cliente->verifica_plano($cliente['planos'], 'Free')) {
            return response()->json(['status' => 'nao_pode_excluir']);
        } else {
            $cliente->planos()->detach();
            if ($cliente->delete()) {
                return response()->json(['status' => 'sucesso_delete']);
            } else {
                return response()->json(['status' => 'erro_delete']);
            }
        }

    }

}

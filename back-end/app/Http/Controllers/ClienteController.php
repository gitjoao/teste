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
        $clientes = $this->Cliente->with('planos')->get();
        return json_encode($clientes);
    }

    public function store(Request $request)
    {
        $data = $request->json()->all();

        $email = $this->Cliente->where('email', $data['email'])->withTrashed()->count();

        if($email == 0) {

            $insert = $this->Cliente->create($data);
    
            $cliente = $this->Cliente->findOrFail($insert['id']);
            $cliente->planos()->sync($data['planos']);
    
            if ($insert) {
                return response('sucesso_salvar');
            } else {
                return response('erro_salvar');
            }
        } else {
             return response('email_existente');
        }

    }

    public function show($id)
    {
        $cliente = $this->Cliente->with('planos')->findOrFail($id);
        return json_encode($cliente);
    }

    public function update(Request $request, $id)
    {
        $cliente = $this->Cliente->findOrFail($id);
        
        $newdata = $request->json()->all();

        $update = $cliente->update($newdata);

        if ($update) {
            return response()->json(['status' => 'sucesso_update']);
        } else {
            return response()->json(['status' => 'erro_update']);
        }
    }

    public function destroy($id)
    {
        $cliente = $this->Cliente->with('planos')->findOrFail($id);

        if ($cliente->verfica_estado($cliente, 'São Paulo') &&
            $cliente->verifica_plano($cliente['planos'], 'Free')) {
            return "nao_pode_excluir";
        } else {
            $cliente->planos()->detach();
            if ($cliente->delete()) {
                return response('sucesso_delete');
            } else {
                return response('erro_delete');
            }
        }

    }

    public function update_planos(Request $request, $id)
    {
        $cliente = $this->Cliente->findOrFail($id);

        $data = $request->json()->all();
        $cliente->planos()->detach();
        if ($cliente->planos()->sync($data['planos'])) {
            return response('sucesso_add');
        } else {
            return response('erro_add');

        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
      
    private $cliente;

    public function __construct(Cliente $cliente){
        
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
        $insert = $this->Cliente->create($data);

        if ($insert) {
             return response('sucesso_salvar');
        } else {
             return response('erro_salvar');
        }
    }


    public function show($id)
    {
        $cliente = $this->Cliente->with('planos')->find($id);
        return json_encode($cliente);
    }


    public function update(Request $request, $id)
    {
        $newdata = $request->json()->all();

        $cliente = $this->Cliente->find($id);

        $update = $cliente->update($newdata);

        if($update){
           return response('sucesso_update');
        }else{
           return response('erro_update');
        }
    }


    public function destroy($id)
    {
         $cliente = $this->Cliente->find($id);
               
         if($cliente->delete()) {
            return response('sucesso_delete');  
         } else {
            return response('erro_delete');
         }
    }
}

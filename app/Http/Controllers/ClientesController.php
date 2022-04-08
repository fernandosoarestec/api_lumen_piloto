<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\Clientes;
use DB;

class ClientesController extends Controller
{
    private $clientes;
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Clientes $clientes)
    {
        $this->clientes = $clientes;
    }

    public function showAll()
    {
        try{
            $clientes = Clientes::all();
            return response()->json($clientes);
        }
        catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function findCliente($chave)
    {
        try{
            $clientes = Clientes::where('_id', $chave)->get();
            return response()->json($clientes);
        }
        catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function insertCliente(Request $request): JsonResponse
    {
        if ((!$request->has('nome') || empty($request->get('nome'))) && (!$request->has('chave') || empty($request->get('chave'))))

            return response()->json(['error' => 'Favor informar os campos nome e chave'], 400);
        elseif ( !$request->has('nome') || empty($request->get('nome')))

            return response()->json(['error' => 'Favor informar o campo nome'], 400);

        elseif ((!$request->has('chave') || empty($request->get('chave'))))
            return response()->json(['error' => 'Favor informar o campo chave'], 400);

        else{

            $cliente = new Clientes();
            $cliente->chave = $request->input('chave');
            $cliente->nome = $request->input('nome');
            if($cliente->chave!==null && $cliente->nome!==null){
                $cliente->save();
                return response()->json(['success' => 'Cliente inserido com sucesso'], 200);

            }else{
                return response()->json(['error' => 'Dados insuficientes'], 400);
        }
    }
}
        /*$this->clientes->create($request->all());

        return response()
                    ->json(['data' => [
                                'message' => 'Cliente foi criado com sucesso!']
                           ]);
                            */



    public function updateCliente($clientes, Request $request)
    {

        $clientes = $this->clientes->find($clientes);

        if($clientes){
            $clientes->update($request->all());
            return response()
                    ->json(['data' => [
                                'message' => 'Cliente foi atualizado com sucesso!']
                           ]);
        }
        else{
            return response()
                    ->json(['data' => [
                                'message' => 'Cliente não encontrado!']
                           ]);
        }

    }

    public function delete($clientes)
    {

        $clientes = $this->clientes->find($clientes);
        if(!$clientes){
            return response()
                ->json([
                    'data' => [
                        'message' => 'Cliente não encontrado!'
                    ]
                ]);
        }else{
            $clientes->delete();
            return response()
                ->json([
                    'data' => [
                        'message' => 'Cliente foi deletado com sucesso!'
                    ]
                ]);
        }

    }

}

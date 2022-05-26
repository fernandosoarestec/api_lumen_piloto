<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\Usuarios;
use DB;

class UsuariosController extends Controller
{
    private $usuarios;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function __construct(Usuarios $usuarios)
     {
         $this->usuarios = $usuarios;
     }
     
     public function getUsuario(Request $request){
           
        $usuario = $this->usuarios->where('nomeusu', $request->nomeusu)
                                    ->where('senha', $request->senha)
                                    ->first();
                         

        return response()->json($usuario);

     }
     

     public function listarUsuarios(){
            try{
                $usuarios = Usuarios::all();
                return response()->json($usuarios);
            }
            catch(Exception $e){
                return response()->json(['error' => $e->getMessage()], 500);
            }
     }

}
<?php

namespace App\Http\Controllers\Api;

use App\Conta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContaController extends Controller
{
    private $conta;

    public function __construct(Conta $Conta)
    {
        $this->conta = $Conta;
    }
    public function index($agencia,$nconta)
    {
        $qry = "SELECT id FROM contas WHERE agencia = $agencia AND conta = $nconta";
        $contaObj = DB::select($qry);

        return response()->json($contaObj);
    }
    public function salvar(Request $request)
    {
        try{
            $contaObj = $request->all();
            
            $this->conta->create($contaObj);
            return response()->json(['msg' => 'Conta Salva']);
            
        }catch(\Exception $e){
            return response()->json($e);
        }
    }
}

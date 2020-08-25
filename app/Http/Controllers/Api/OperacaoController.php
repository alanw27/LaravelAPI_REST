<?php

namespace App\Http\Controllers\Api;

use App\Operacao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperacaoController extends Controller
{
    private $operacao;

    public function __construct(Operacao $Operacao)
    {
        $this->operacao = $Operacao;
    }

    public function index()
    {
        $data = ['data' => $this->operacao->all()];

        return response()->json($data);
    }
    public function salvar(Request $request)
    {
        try{
            $operacaoObj = $request->all();

            if($operacaoObj['TipoOperacoes_id'] == 3)
            {
                $contas_id = $operacaoObj['contas_id'];
                $qry = "SELECT distinct
                (select IFNULL(SUM(o1.`valor`), 0) from `operacoes` o1 where o1.`TipoOperacoes_id` = 1 AND o1.`contas_id` = $contas_id) - (select IFNULL(SUM(o2.`valor`), 0) from `operacoes` o2 where o2.`TipoOperacoes_id` = 2 AND o2.`contas_id` = $contas_id) saldo
                FROM `operacoes` o ";
                
                $contaObj = DB::select($qry);
                return response()->json(['msg' => $contaObj[0]->saldo]);
            }
            else
            {
                $this->operacao->create($operacaoObj);
                return response()->json(['msg' => 'Operação Salva']);
            }
        }catch(\Exception $e){

        }

    }
}

<?php

namespace App\Http\Controllers\Api;
use App\TipoOperacao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoOperacaoController extends Controller
{
    private $tipo_operacao;

    public function __construct(TipoOperacao $tipo_Operacao)
    {
        $this->tipo_operacao = $tipo_Operacao;
    }

    public function index()
    {
        return response()->json($this->tipo_operacao->all());
    }
    public function salvar(Request $request)
    {
        try{
            $contaObj = $request->all();
            $this->conta->create($contaObj);
    
            return response()->json(['msg' => 'Tipo de Operação Salva']);
        }catch(\Exception $e){

        }
    }
}

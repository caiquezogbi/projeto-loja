<?php

namespace App\Http\Controllers\api;

use App\Api\ApiMessages;
use  App\Http\Controllers\controller;
use App\Models\Produto;
use App\Http\Requests\ProdutoRequest;


class ProdutoController extends Controller
{
    //
    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto; //associando a um atributo interno 
    }





    public function index()
    {

        $produto = $this->produto::all();

        return response()->json($produto, 200);
    }




    public function store(ProdutoRequest $request)     //endpoint de criacao do produto
    {
        $data = $request->all();

        try {

            $produto = $this->produto->create($data);

            return response()->json([
                'data' => [
                    'msg' => 'Produto inserido com sucesso!'
                ]
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }





    public function show($id) //endpoint busca de imovel pelo id
    {

        try {

            $produto = $this->produto->findOrFail($id); //busco o produto que quero pelo findOrFail


            return response()->json([
                'data' => $produto
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }






    public function update($id, ProdutoRequest $request)     //endpoint de atualizacao do produto
    {
        $data = $request->all();

        try {

            $produto = $this->produto->findOrFail($id); //busco o produto que quero pelo findOrFail
            $produto->update($data); //atualizo o produto encontrado pelo id

            return response()->json([
                'data' => [
                    'msg' => 'Produto atualizado com sucesso!'
                ]
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }




    public function delete($id)
    {
        $produto = $this->produto->find($id);
        $produto->delete($id);

        return response()->json(['data' => ['msg' => 'produto removido!']]);
    }
}

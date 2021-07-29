<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use Illuminate\Http\Request;
use App\Models\Produto;
use  App\Http\Controllers\controller;
use App\Repository\ProdutoRepository;

class ProdutoSearchController extends Controller
{

    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }


    public function index(Request $request)
    {


        $repository = new ProdutoRepository($this->produto);

        if ($request->has('coditions')) {
            $repository->selectCoditions($request->get('coditions'));
        }
        if ($request->has('fields')) {
            $repository->selectFilter($request->get('fields'));
        }



        return response()->json([
            'data' => $repository->getResult()->paginate(5)
        ], 200);
    }


    public function show($id)
    {
        //
    }
}

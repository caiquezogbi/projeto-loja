<?php


namespace App\Repository;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{

    protected $model;

    public function   __construct(Model $model)
    {
        $this->model = $model;
    }


    public function selectCoditions($coditions)         //filtro da tabela produto por condicao
    {
        $expressions = explode(';', $coditions);    //separa as condicoes por ;

        foreach ($expressions as $e) {
            $exp = explode(':', $e);  //campo igual ao valor
            $this->model =  $this->model->where($exp[0], $exp[1], $exp[2]);  //adicionando condicao onde o nome seja igual ao valor da query
        }
    }





    public function selectFilter($filters)         //filtro da tabela produto por campos
    {
        $this->model =  $this->model->selectRaw($filters);
    }




    public function getResult()
    {
        return   $this->model;
    }
}

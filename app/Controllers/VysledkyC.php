<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Result;

class VysledkyC extends BaseController
{
    public function index($id)
    {
        $result = new Result();

        $results = $result->join('rider', 'result.id_stage = stage.id', 'left')
            ->where('result.id_stage', $stageId)
            ->orderBy('result.rank', 'ASC')
            ->get()
            ->getResult();

        $data = [
            'results' => $results,

        ];
        return view('vysledky', $data);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Result;
use App\Models\Stage;

class VysledkyC extends BaseController
{
    public function index($StageId, $Type)
    {
        $result = new Result();
        $stage = new Stage();
        $stageData = $stage->find($StageId);

        $results = $result->select('result.*, rider.first_name, rider.last_name')
            ->join('rider', 'result.id_rider = rider.id', 'left')
            ->where('result.id_stage', $StageId)
            ->where('result.type_result', $Type)
            ->orderBy('result.rank', 'ASC')
            ->findAll();

        $data = [
            'results' => $results,
            'type' => $Type,
            'stage' => $stageData,
        ];
        return view('Vysledky', $data);
    }
}

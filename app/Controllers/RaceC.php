<?php

namespace App\Controllers;

use App\Models\RaceYear;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\Stage;

class RaceC extends BaseController
{
    public function index($id)
    {
        $stage = new Stage();
        $stageData = $stage->select('
            fin_stage.*, 
            fin_parcour_type.name as name,
            fin_rider.first_name as winner_first,
            fin_rider.last_name as winner_last,
            fin_rider.photo as winner_photo')
        ->where('id_race_year', $id)
        ->join('parcour_type', 'stage.parcour_type = parcour_type.id', 'left')
        ->join('result', 'stage.id = result.id_stage AND result.type_result = 1 AND result.rank = 1', 'left')
        ->join('rider', 'result.id_rider = rider.id', 'left')
        ->findAll();

        $heder = $stage
        ->select('stage.*, race_year.year AS year, race_year.real_name AS race_name')
        ->join('race_year', 'stage.id_race_year = race_year.id', 'left')
        ->where('stage.id_race_year', $id)
        ->findAll();
    $data = [
        'stage' => $stageData,
        'heder' => $heder,
    ];
    return view('Race', $data);
    }
}
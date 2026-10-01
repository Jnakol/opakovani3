<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RaceYear;
use App\Models\Stage;
use CodeIgniter\HTTP\ResponseInterface;

class ZakladC extends BaseController
{
    public function index()
    {
        $raceYear = new RaceYear();
        $priz_data = $raceYear->select('race_year.*, SUM(s.distance) as total_distance')
            ->join('stage s', 'race_year.id = s.id_race_year', 'left')
            ->where('id_race', 124)
            ->groupBy('race_year.id')
            ->orderBy('race_year.year', 'DESC')
            ->findAll();
    $data = [
        'priz' => $priz_data
    ];
    return view('Zaklad', $data);
    }
}

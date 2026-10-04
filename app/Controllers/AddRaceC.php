<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RaceYear;


class AddRaceC extends BaseController
{
    public function index()
    {
        $race= new RaceYear();
        $races = $race
            ->where('sex', 'M')
            ->where('category', 'E')
            ->like('real_name', 'Paris - Nice')
            ->orderBy('real_name', 'ASC')
            ->findAll();

        $data = [
            'races' => $races
        ];

        return view('AddRace', $data);
    }
    public function AddRace()
    {
        $year = new RaceYear();
        $rules = [
            'real_name' => 'required|min_length[3]',
            'id_race'   => 'required|integer',
            'year'      => 'required|integer|exact_length[4]',
            'logo'      => 'uploaded[logo]|is_image[logo]|max_size[logo,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $logoFile = $this->request->getFile('logo');
        $logoName = null;

        if ($logoFile && $logoFile->isValid() && !$logoFile->hasMoved()) {
            $logoName = $logoFile->getRandomName();
            $logoFile->move(FCPATH . 'assets/img/logos/', $logoName);
        }

        $year->insert([
            'real_name' => $this->request->getPost('real_name'),
            'id_race'   => $this->request->getPost('id_race'),
            'year'      => $this->request->getPost('year'),
            'logo'      => $logoName
        ]);

        return redirect()->to(base_url())->with('success', 'Nový ročník závodu byl úspěšně přidán.');
    }
}

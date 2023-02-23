<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;

class HomeController extends Controller
{
    public function index() {
        $user = User::all();
        $project = Project::all();

        $data = [
            'title' => 'Dashboard',
            'user' => $user,
            'project' => $project
        ];

        return view('index', $data);

    }

    public function chartjs() {
        $user = User::all();
        $project = Project::all();
        
        $data = [
            'title' => 'Dashboard',
            'user' => $user,
            'project' => $project
        ];
        return view('chartjs', $data);
    }

    public function import() {
        echo "tes";
    }
}

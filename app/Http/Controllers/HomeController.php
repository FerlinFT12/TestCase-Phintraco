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
            'isi' => 'index',
            'user' => $user,
            'project' => $project
        ];

        return view('layouts.wrapper', $data);

    }
}

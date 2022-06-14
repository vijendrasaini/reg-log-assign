<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Dashboard extends Controller{

    function index(){
        if(!session()->has('email'))
            return redirect()->to('/login');
        return view('dashboard');
    }
}
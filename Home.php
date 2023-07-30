<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; // for pages unknown

class Home extends BaseController
{
    public function index()
    {
        if (session('user_type')) {
            return redirect()->to('/dashboard');
        }

        return view('templates/header')
            . view('login')
            ;
        //return view('welcome_message');
    }

        public function tempinvestorform()
    {

        return view('templates/header')
            . view('investor_profile_page');
    }

        
}

<?php

namespace App\Controllers;
use App\Models\UserModel;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        //
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo =$userModel->find($loggedInUserId);

        $data =[
            'title'=>"Dashboard",
            'userInfo'=> $userInfo

        ];

        return view('layouts/dashboard', $data);
    }
}

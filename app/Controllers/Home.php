<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\Hash;

class Home extends BaseController
{
    public function index()
    {
        return view('layouts/login');
    }
    public function register()
    {
        return view('layouts/register');
    }
    public function loginUser()
    {

        if ($this->request->isAJAX()) {
            $userModel = new UserModel();

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $data = $userModel->where('email', $email)->first();

            if ($data) {
                $checkpass = Hash::check($password, $data['password']);
                if ($checkpass) {
                    $set_data = [
                        'success' => true,
                        'msg' => 'Logged in successfully',
                        'redirectTo' => base_url('dashboard'),
                        'id' => $data['id'],
                        'email' => $data['email'],
                    ];
                    session()->set('loggedInUser', $data['id']);
                    return $this->response->setJSON(json_encode($set_data));
                } else {
                    $set_data = [
                        'success' => false,
                        'msg' => 'Incorrect password',
                    ];
                    session()->setFlashdata('error', 'Incorrect Password');
                    return $this->response->setJSON(json_encode($set_data));
                }
            } else {
                $set_data = [
                    'success' => false,
                    'msg' => 'Email does not exist'
                ];
                session()->setFlashdata('error', 'Email does not exist');
                return $this->response->setJSON(json_encode($set_data));
            }
        }
    }

    public function insert()
    {
        $userModel = new UserModel();
        $data = [
            'first_name' => $this->request->getVar('first_name'),
            'middle_name'  => $this->request->getVar('middle_name'),
            'last_name'  => $this->request->getVar('last_name'),
            'birth_date'  => $this->request->getVar('birth_date'),
            'sex'  => $this->request->getVar('sex'),
            'email'  => $this->request->getVar('email'),
            'password'  => Hash::encrypt($this->request->getVar('password')),
        ];
        $data = $userModel->insert($data);

        if ($data) {
            $set_data = [
                'success' => true,
                'msg' => 'Registerd Successfully',
                'redirectTo' => base_url('/'),
            ];
            session()->setFlashdata('success', 'You can log in now');
            return $this->response->setJSON(json_encode($set_data));
        } else {
            $set_data = [
                'success' => false,
                'msg' => 'Registration failed encountered some error',
                'redirectTo' => base_url('register'),
            ];
            session()->setFlashdata('error', 'Something went wrong contact technical support');
            return $this->response->setJSON(json_encode($set_data));
        }
    }
}

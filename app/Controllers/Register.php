<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \App\Models\UserModel;

class Register extends Controller
{

    public function signup()
    {
        helper('form');
        $data = [];
        $rules = [
            'firstname' => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'First Name is required.',
                    'min_length' => 'First Name should contain atleast 3 characters.',
                    'max_length' => 'First Name can contain max 20 characters.'
                ]
            ],
            'lastname' => [
                'rules' => 'max_length[20]',
                'errors' => [
                    'max_length' => 'First Name can contain max 20 characters.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|max_length[100]',
                'errors' => [
                    'required' => 'Email is required.',
                    'max_length' => 'Email can contain max 100 characters.',
                    'valid_email' => 'Entered Email is not a valid email.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[30]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Password shold contain min 6 characters.',
                    'max_length' => 'Password can contain max 10 characters.'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Password is required.',
                    'matches' => 'Provided password does match with above password.'
                ]
            ]
        ];
        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                $userobj = new UserModel();
                $user_data = [
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                ];
                $status = $userobj->createUser($user_data);
                if ($status){
                    return redirect()->to('/login');
                }
                else {
                    $session = \Config\Services::session();
                    $session->setTempdata('database_error', 'Unale to create your account, Please try again', 3);
                    return view('register', $data);
                }
            } else {

                $data['validation'] = $this->validator;
                return view('register', $data);
            }
        }
        return view('register', $data);
    }
}

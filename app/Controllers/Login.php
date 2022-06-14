<?php

namespace App\Controllers;
use \CodeIgniter\Controller;
use App\Models\UserModel;
use \Config\Services;

class Login extends Controller{

    public function __construct()
    {
        $this->session = Services::session();
    }
    public function login(){
        if(session()->has('email'))
            return redirect()->to('/dashboard');
        helper('form');
        $data = [];
        $rules = [
            'email' => [
                            'rules'=> 'required|valid_email|max_length[100]',
                            'errors'=>[
                                'required'=>'Email is required.',
                                'max_length' => 'Email can contain max 100 characters.',
                                'valid_email' => 'Entered Email is not a valid email.'
                            ]
                        ],
            'password' => [
                            'rules'=> 'required',
                            'errors'=>[
                                'required'=>'Password is required.'
                            ]
                        ]
            ];
        if($this->request->getMethod() == 'post'){
            if($this->validate($rules)){
                $userModel = new UserModel();
                $user_data = [
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                ];
                $user_found = $userModel->validUser($user_data);
                if(count($user_found)){
                    $is_matched = password_verify($_POST['password'], $user_found[0]['password']);
                    if($is_matched){
                        $this->session->set(
                            [
                                'firstname'=> $user_found[0]['firstname'],
                                'lastname'=> $user_found[0]['lastname'],
                                'email'=> $user_found[0]['email'],
                            ]
                        );
                        return redirect()->to('/dashboard');
                    }
                    else{
                        $this->session->setTempdata('database_error', 'Your passoword is invalid.', 3);
                        return view('login', $data);
                    }
                }
                else{
                    $this->session->setTempdata('database_error', 'No user found with the email.', 3);
                    return view('login', $data);
                }
            }
            else{
                
                $data['validation'] = $this->validator;
                return view('login', $data);
            }
        }
        return view('login', $data);
    }
    public function logout(){
        session_destroy();
        return redirect()->to('/login');
    }
}
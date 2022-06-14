<?php

namespace App\Models;

use \CodeIgniter\Model;

class UserModel extends Model
{
    protected $db;
    protected $builder;
    public function __construct()
    {
        // $this->db = \Config\Database::connect();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }
    public function selectAll(){
        $result = $this->builder->get();
        return $result;
    }
    public function createUser($data){
        $is_inserted = $this->builder->insert($data);
        echo var_dump($is_inserted);
        return $is_inserted;
    }
    public function validUser($data){
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $where = "email='$email'";

        $result = $this->builder->select('firstname, lastname, email, password')
             ->where($where)
             ->get();
        $fianl_result = $result->getResultArray();
        return $fianl_result;
    }
}
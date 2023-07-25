<?php
namespace Model;
defined('ROOTPATH') OR exit('Access Denied!');

/***
 * User Class
 */

 class User
 {
    use \Model;
    protected $table = 'users';

    protected $allowedColumns = [
        'email',
        'password',
        // 'date'=> "2023-07-05",
    ];

    public function validate($data)
    {
        $this->errors = [];

        if(empty($data['email']))
        {
            $this->errors['email'] = "Email is required";
        }else
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "Email is not valid";
        }

        if(empty($data['password']))
        {
            $this->errors['password'] = "Password is required";
        }

        if(empty($data['terms']))
        {
            $this->errors['terms'] = "Please Accept Terms And Condition";
        }

        if(empty($this->errors))
        {
            return true;
        }
        return false;
    }
 }
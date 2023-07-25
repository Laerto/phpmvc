<?php
/**
 * 
 * Session Class
 * Save or read data to the curent session
 */
namespace Core;

 defined('ROOTPATH') OR exit('Access Denied!');


 class Session 
 {

    public $mainKey = 'APP';
    public $userKey = 'USER';

    // Active Session if not yet started
    private function start_session():int
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        return 1;
    }

    // put data into session
    public function set(mixed $keyOrArray, mixed $value = ''):int
    {
        $this->start_session();

        if(is_array($keyOrArray))
        {
            foreach ($keyOrArray as $key => $value){
                $_SESSION[$this->mainKey][$key] = $value;
            }
            return 1;
        }

        $_SESSION[$this->mainKey][$keyOrArray] = $value;
        return 1;
    }

    // Get data from the session, default is returned if data not found
    public function get(string $key, mixed $default = ''):mixed
    {
        $this->start_session();

        if(isset($_SESSION[$this->mainKey]))
        {
            return $_SESSION[$this->mainKey][$key];
        }

        return $default;

    }

    // Save the user row data into the session after login
    public function auth(mixed $user_row):int
    {
        $this->start_session();

        $_SESSION[$this->userKey] = $user_row;

        return 0;
    }

    // Removes user data from the session
    public function logout():int
    {
        $this->start_session();

        if(!empty($_SESSION[$this->userKey])){
            unset($_SESSION[$this->userKey]);
        }
        return 0;
    }

    // Check if user is loget in
    public function is_loget_in():bool
    {
        $this->start_session();

        if(!empty($_SESSION[$this->userKey])){
            return true;
        }

        return false;
    }

    // // Check if the user is admin
    // public function is_admin():bool
    // {
    //     $this->start_session();
    //     $db = new \Core\Database();

    //     if(!empty($_SESSION[$this->userKey])){
    //         $arr = [];
    //         $arr['id'] = $_SESSION[$this->userKey]->role_id;

    //         if($db->get_row("select * from auth_roles where if = :id && role = 'admin' limit 1")){
    //             return true;
    //         }
    //     }
    //     return false;
    // }


    // Get data from the column in the sesion data
    public function user(string $key = '', mixed $default = ''):mixed
    {
        $this->start_session();

        if(empty($key) && !empty($_SESSION[$this->userKey])){
            return $_SESSION[$this->userKey];
        }else
        if(!empty($_SESSION[$this->userKey]->$key)){
            return $_SESSION[$this->userKey]->$key;
        }
        return $default;
    }

    // returns data from a key  and deletes it
    public function pop(string $key, mixed $default = ''):mixed
    {
        $this->start_session();

        if(!empty($_SESSION[$this->mainKey][$key])){
            $value = $_SESSION[$this->mainKey][$key];
            unset($_SESSION[$this->mainKey][$key]);
            return $value;
        }
        return $default;
    }

    // Return all data from the APP array
    public function all():mixed
    {
        $this->start_session();
        if(isset($_SESSION[$this->mainKey]))
        {
            return $_SESSION[$this->mainKey];
        }
        return [];
    }

 }

// min 01:07:07
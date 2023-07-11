<?php

/***
 * User Class
 */

 class User
 {
    use Model;
    protected $table = 'users';

    protected $allowedColumns = [
        'name',
        'age',
        // 'date'=> "2023-07-05",
    ];
 }
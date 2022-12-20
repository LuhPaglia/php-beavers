<?php
    include '../data/config.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $role = $_POST['role'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        foreach($data as $user){
            if($user['pasword'] == $password){

            }
        }

        if($role == "admin"){
            
        }
        if($role == "teacher"){
            
        }
        if($role == "student"){
            
        }
    }
?>
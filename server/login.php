<?php
    include '../data/config.php';
    include '../services/dbservices.php';
    include '../objects/adminObj.php';
    include '../objects/teacherObj.php';
    include '../objects/studentObj.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $role = $_POST['role'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        

        $dbSrv = new dbServices($hostName,$userName,$password,$dbName);
        if($dbcon = $dbSrv->dbConnect()){

            if($role == "admin"){
                $result = $dbSrv->select('admin_tb',null,['email'=>"'$email'",'password'=>"'$pass'"],'AND');
                if($row = $result->fetch_assoc() != null) {
                    $admin = new adminObj($row['admin_id'],$row['user_name'],$row['password'],$row['email'],$row['profile_url'],$row['birthday'],$row['address']);
                    $_SESSION['logUser'] = $admin;
                    $_SESSION['role'] = "admin";
                    header("Location: ".$baseName.'adminPage.php');
                    exit();
                }
            }
            else if($role == "teacher"){
                $result = $dbSrv->select('teacher_tb',null,['email'=>"'$email'",'password'=>"'$pass'"],'AND');
                if($row = $result->fetch_assoc() != null) {
                    $teacher = new teacherObj($row['teacher_id'],$row['user_name'],$row['password'],$row['email'],$row['course_id'],$row['salary'],$row['birthday'],$row['address']);
                    $_SESSION['logUser'] = $teacher;
                    $_SESSION['role'] = "teacher";
                    header("Location: ".$baseName.'studentMng.php');
                    exit();
                }
            }
            else if($role == "student"){
                $result = $dbSrv->select('student_tb',null,['email'=>"'$email'",'password'=>"'$pass'"],'AND');
                if($row = $result->fetch_assoc() != null) {
                    $student = new studentObj($row['student_id'],$row['user_name'],$row['password'],$row['email'],$row['course_id'],$row['teacher_id'],$row['birthday'],$row['address']);
                    $_SESSION['logUser'] = $student;
                    $_SESSION['role'] = "student";
                    header("Location: ".$baseName.'gradeMngPage.php');
                    exit();
                }
            }

        } else "DB connection problem";

        header("Location: ".$baseName.'index.php?msg=2');
        exit();

    }
?>
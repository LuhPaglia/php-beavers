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
                $select = "SELECT * FROM admin_tb WHERE email='$email'";
                $result = $dbcon->query($select);
                if($user = $result->fetch_assoc() != null) {
                    if(password_verify($pass,$user['password'])){
                        $admin = new adminObj($row['admin_id'],$row['user_name'],$row['password'],$row['email'],$row['profile_url'],$row['birthday'],$row['address']);
                        $_SESSION['logUser'] = $admin;
                        $_SESSION['role'] = "admin";
                        $dbcon->close();
                        header("Location: ".$baseName.'adminPage.php');
                        exit();
                    }
                }
            }
            else if($role == "teacher"){
                $select = "SELECT * FROM teacher_tb WHERE email='$email'";
                $result = $dbcon->query($select);
                if($user = $result->fetch_assoc() != null) {
                    if(password_verify($pass,$user['password'])){
                        $teacher = new teacherObj($row['teacher_id'],$row['user_name'],$row['password'],$row['email'],$row['course_id'],$row['salary'],$row['birthday'],$row['address']);
                        $_SESSION['logUser'] = $teacher;
                        $_SESSION['role'] = "teacher";
                        $dbcon->close();
                        header("Location: ".$baseName.'studentMng.php');
                        exit();
                    }
                }
            }
            else if($role == "student"){
                $select = "SELECT * FROM student_tb WHERE email='$email'";
                $result = $dbcon->query($select);
                if($user = $result->fetch_assoc() != null) {
                    if(password_verify($pass,$user['password'])){
                        $student = new studentObj($row['student_id'],$row['user_name'],$row['password'],$row['email'],$row['course_id'],$row['teacher_id'],$row['birthday'],$row['address']);
                        $_SESSION['logUser'] = $student;
                        $_SESSION['role'] = "student";
                        $dbcon->close();
                        header("Location: ".$baseName.'gradeMngPage.php');
                        exit();
                    }
                }
            }

        } else "DB connection problem";

        $dbcon->close();
        header("Location: ".$baseName.'index.php?msg=2');
        exit();

    }
?>
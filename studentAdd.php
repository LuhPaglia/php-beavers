<?php
include './data/config.php';
include './services/dbservices.php';
include './objects/studentObj.php';

$dbSrv = new dbServices($hostName,$userName,$password,$dbName);

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $course_id = $_POST['course_id'];
    $teacher_id = $_POST['teacher_id'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];

    $newStu = new studentObj($student_id,$user_name,$password,$email,$course_id,$teacher_id,$address,$birthday);
    $valuesArray = $newStu->toInsert();


    if($dbSrv->dbConnect()){
        if($dbSrv->insert('student_tb',$valuesArray)){
            // "added";
            header("Location: studentMng.php?result=1");
            exit();
        }
    }
    // "not added";
    header("Location: studentMng.php?result=2");
    exit();

}

?>
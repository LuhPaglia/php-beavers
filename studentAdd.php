<?php
include './data/config.php';
include './services/dbservices.php';
include './objects/studentObj.php';

$dbSrv = new dbServices($hostName,$userName,$password,$dbName);

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT) ;
    $course_id = $_POST['course_id'];
    $teacher_id = $_POST['teacher_id'];

    $profile_pic = $_FILES['profile_pic'];

    $address = $_POST['address'];
    $birthday = $_POST['birthday'];

    if(!is_dir('./data/profile/student'.$email)){   
        mkdir('./data/profile/student/'.$email,0755);
    }

    $targetDir = "./data/profile/student/$email/";
    if($profile_pic['type']=="image/jpeg" || $profile_pic['type']=="image/jpg" || $profile_pic['type']=="image/png"){
        if(move_uploaded_file($profile_pic['tmp_name'],$targetDir.$profile_pic['name'])){
            $profile_url = $targetDir.$profile_pic['name'];
        }
        else {
            header("Location: studentMng.php?msg=3");
            exit();
        }
    }

    $newStu = new studentObj(null,$user_name,$password,$email,$course_id,$teacher_id,$profile_url,$address,$birthday);
    $valuesArray = $newStu->toInsert();
    $fieldArray = ['user_name','password','email','course_id','teacher_id','profile_url','address','birthday'];

    if($dbSrv->dbConnect()){
        if($dbSrv->insert('student_tb',$valuesArray,$fieldArray)){
            // "added";
            header("Location: studentMng.php?msg=1".$profile_url);
            exit();
        }
    } else{
        echo "DB connection problem";
    }
    // "not added";
    header("Location: studentMng.php?msg=2");
    exit();

}

?>
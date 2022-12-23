<?php
    include './data/config.php';
    include './services/dbservices.php';
    include './objects/gradeObj.php';

    $dbSrv = new dbservices($hostName, $userName, $password , $dbName);

    if($_SERVER['REQUEST_METHOD']=='POST'){

    $classwork = $_POST['classwork_name'];
    $studentId = $_POST['student_id'];
    $teacherId = $_POST['teacher_id'];
    $courseId = $_POST['course_id'];
    $mark = $_POST['mark'];
    $date = $_POST['date'];
    $feedback = $_POST['feedback'];

    $newGrade = new gradeObj (null,$classwork,$studentId,$teacherId,$courseId,$mark,$date,$feedback);

    $gradeVal = $newGrade->toInsert();
    $fieldArray = ['classwork','student_id','teacher_id','course_id','mark','mark_date','feedback' ];

    if($dbSrv->dbConnect()){
      if($dbSrv->insert("grade_tb",$gradeVal,$fieldArray)){
          header("Location: gradeMngPage.php?msg=1");
          exit();
      }
      
      
    }

  

    header("Location: ../index.php?add=success");

    header("Location: gradeMngPage.php?msg=2");
          exit();

  }
  ?>
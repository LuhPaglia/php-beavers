<?php
    include_once 'config.php';

    $gradeId = $_POST['grade_id'];
    $classwork = $_POST['classwork'];
    $studentId = $_POST['student_id'];
    $teacherId = $_POST['teacher_id'];
    $courseId = $_POST['course_id'];
    $mark = $_POST['mark'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $feedback = $_POST['feedback'];

    $sql = "INSERT INTO `grade_tb`(`grade_id`, `classwork`, `student_id`, `teacher_id`, `course_id`, `mark`, `mark_date`, `feedback`) VALUES ('[$gradeId]','[$classwork]','[$studentId]','[$teacherId]','[$courseId]','[$mark]','[$address]','[$feedback]')"
    mysqli_query($conn, $sql);

    header("Location: ../index.php?add=success");
  ?>
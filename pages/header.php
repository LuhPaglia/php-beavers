<?php include './data/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Beavers Group</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #5cb85c; color: black;">
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    
                    <li class="nav-item">
                        <a class="nav-link" style="display: <?php 
                        if(isset($_SESSION['logUser'])) echo "none";
                        else echo "block";
                         ?> ; color: black;" href="<?php echo $baseName.'';?>">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="display: <?php 
                        if(isset($_SESSION['logUser'])) echo "none";
                        else echo "block";
                         ?> ; color: black;" href="<?php echo $baseName.'index.php';?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="display: <?php 
                        if(isset($_SESSION['logUser'])) echo "block";
                        else echo "none";
                         ?> ; color: black;" href="<?php echo $baseName.'server/logout.php';?>">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="display: <?php 
                        if(isset($_SESSION['role']) && $_SESSION['role']== "admin") echo "block";
                        else echo "none";
                         ?> ; color: black;" href="<?php echo $baseName.'adminPage.php';?>">Admin Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="display: <?php 
                        if(isset($_SESSION['role']) && $_SESSION['role']== "admin") echo "block";
                        else echo "none";
                         ?> ; color: black;" href="<?php echo $baseName.'teacherMngPage.php';?>">Teacher Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="display: <?php 
                        if(isset($_SESSION['role']) && $_SESSION['role']!= "student") echo "block";
                        else echo "none";
                         ?> ; color: black;" href="<?php echo $baseName.'studentMng.php';?>">Student Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="display: <?php 
                        if(isset($_SESSION['role']) && $_SESSION['role']!= "student") echo "block";
                        else echo "none";
                         ?> ; color: black;" href="<?php echo $baseName.'gradeMngPage.php';?>">Grade Management</a>
                    </li>
    
                </ul>
            </div>
        </nav>
    </header>
    <main class="container-fluid">
        
    
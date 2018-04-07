<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kisumu Health</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Kisumu Health</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="index.php">Dashboard </a></li>
                    <li role="presentation"><a href="patients.php">Patients </a></li>
                    <li role="presentation" class="active"><a href="treatments.php">Prescriptions </a></li>
                    <li role="presentation"><a href="tests.php">Tests</a></li>
                    <li role="presentation"><a href="personnel.php">Personnel </a></li>
                    <li role="presentation"><a href="facilities.php">Facilities</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['username'];?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                            <li role="presentation"><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
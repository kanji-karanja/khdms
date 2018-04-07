<?php
session_start();
require 'stats.php';
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
                    <li class="active" role="presentation"><a href="#">Dashboard </a></li>
                    <li role="presentation"><a href="patients.php">Patients </a></li>
                    <li role="presentation"><a href="treatments.php">Prescriptions</a></li>
                    <li role="presentation"><a href="tests.php">Tests</a></li>
                    <li role="presentation"><a href="personnel.php">Personnel </a></li>
                    <li role="presentation"><a href="facilities.php">Facilities</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['username'];?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                            <li role="presentation"><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-left text-primary">Dashboard </h4></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <div class="panel panel-primary" onclick="document.location.href='patients.php'">
                    <div class="panel-body"><span><h1 class="text-primary"><i class="fa fa-users"></i> <?php echo $pats;?></h1></span></div>
                    <div class="panel-heading">
                        <h3 class="panel-title">Number of Patients</h3></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <div class="panel panel-success" onclick="document.location.href='treatments.php'">
                    <div class="panel-body"><span><h1 class="text-success"><i class="fa fa-medkit"></i> <?php echo $press;?></h1></span></div>
                    <div class="panel-heading">
                        <h3 class="panel-title">Prescriptions</h3></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <div class="panel panel-info" onclick="document.location.href='facilities.php'">
                    <div class="panel-body"><span><h1 class="text-info"><i class="fa fa-hospital-o"></i> <?php echo $facs;?></h1></span></div>
                    <div class="panel-heading">
                        <h3 class="panel-title">Facilities</h3></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <div class="panel panel-warning" onclick="document.location.href='personnel.php'">
                    <div class="panel-body"><span><h1 class="text-warning"><i class="fa fa-user-md"></i> <?php echo $pers;?></h1></span></div>
                    <div class="panel-heading">
                        <h3 class="panel-title">Personnel</h3></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Statistics </h3></div>
                    <div class="panel-body"><span>Panel Body</span></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Notifiications </h3></div>
                    <div class="panel-body"><span>Panel Body</span></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
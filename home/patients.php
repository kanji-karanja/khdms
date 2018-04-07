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
    <!-- add to document <head> -->
    <link href="assets/dist/filepond.css" rel="stylesheet">
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
                    <li class="active" role="presentation"><a href="patients.php">Patients </a></li>
                    <li role="presentation"><a href="treatments.php">Prescriptions </a></li>
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
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                 <form>
                    <div class="form-group"></div>
                    <div class="input-group">
                        <div class="input-group-addon"><span><i class="glyphicon glyphicon-search"></i></span></div>
                        <input class="form-control" type="text" placeholder="Search for Patient" autocomplete="true" onkeyup="searchData(this.value)" id="searchBox"><br>
                    </div>
                    <span class="help-block">You can search using ID, name, NHIF,email or Phone Number. Search is not case sensitive.</span>
                </form>
                <br>
                <div class="list-group table-of-contents">
                    <div id="txtResult">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class='panel panel-default'><div class='panel-body'>
                <h5>Patients List</h5>
                </div></div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>National ID</th>
                                <th>Patient Name</th>
                                <th>Gender</th>
                                <th>NHIF</th>
                            </tr>
                        </thead>
                        <tbody id="tableResults">
                        </tbody>
                    </table>
                    <?php
                    require 'assets/serve/records.php';
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <h5>Add Patient:</h5>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <?php require 'assets/serve/addPatient.php'; ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 well well-lg">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label class="control-label">National ID</label>
                        <input class="form-control" type="text" name="pat_id" placeholder="Enter National ID" required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Full name</label>
                        <input class="form-control" type="text" name="pat_name" placeholder="Enter Patient Name:" required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Date Of Birth::</label>
                        <input class="form-control" type="date" name="pat_dob" required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Gender </label>
                        <div class="radio">
                            <label class="control-label">
                                <input type="radio" name="gender" value="male" required="required">Male</label>
                        </div>
                        <div class="radio">
                            <label class="control-label">
                                <input type="radio" name="gender" value="female" required="required">Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">NHIF Number</label>
                        <input class="form-control" type="text" name="pat_nhif" placeholder="Enter NHIF number" required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Phone Number</label>
                        <input class="form-control" type="text" name="pat_phone" placeholder="Enter Phone Number:" required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email: </label>
                        <input class="form-control" type="text" name="pat_email" placeholder="Enter Email" required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Upload Picture</label>
                        <input type="file" name="profilePic" class="filepond" accept="image/png, image/jpeg, image/gif">
                    </div>
                <button class="btn btn-info" type="submit" name="addPat">Add </button>
                <button class="btn btn-default" type="reset">RESET </button>
            </form>
            </div>
            <div class="col-md-12"></div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/search.js"></script>
    <script type="text/javascript" src="assets/js/patients.js"></script>
    <!-- add before </body> -->
    <script src="assets/dist/filepond.js"></script>
    <script>
const inputElement = document.querySelector('input[type="file"]');
const pond = FilePond.create( inputElement );
// We register the plugins required to do 
// image previews, cropping, resizing, etc.
FilePond.registerPlugin(
  FilePondPluginFileEncode,
  FilePondPluginFileValidateType,
  FilePondPluginImageExifOrientation,
  FilePondPluginImagePreview,
  FilePondPluginImageCrop,
  FilePondPluginImageResize,
  FilePondPluginImageTransform
);

// Select the file input and use 
// create() to turn it into a pond
FilePond.create(
  document.querySelector('input'),
  {
    labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
    imagePreviewHeight: 170,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200
  }
);

</script>
</body>

</html>
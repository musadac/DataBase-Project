<html lang="en">
<head>
  <title>FITME-USER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="reports.css">
  <link href="vendor/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="vendor/table.min.css" rel="stylesheet">
</head>

<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Progress Report <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <?php
      session_start();
        $userid = $_SESSION["userid"];
        echo ' <li class="nav-item active"><a class="nav-link" href="#">Welcome '.$userid.'<span class="sr-only">(current)</span></a></li>';
      ?>
  </div>
</nav>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="/user.php">Home</a>
  <a href="/progress.php">Progress Log</a>
  <a href="/createworkout.php">CREATE WORKOUT PLAN</a>
</div>
<div class="row-22" >
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text3">
                                                BMI</div>
                                                <?php
                                                    $db_sid = 
                                                    "(DESCRIPTION =
                                                    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
                                                    (CONNECT_DATA =
                                                        (SERVER = DEDICATED)
                                                        (SERVICE_NAME = musadac)
                                                    )
                                                    )";           

                                                    $db_user = "scott";   // Oracle username e.g "scott"
                                                    $db_pass = "tiger";    // Password for user e.g "1234"
                                                    $con = oci_connect($db_user,$db_pass,$db_sid); 
                                                    
                                                    $query = "select * from member where userid = '$userid'";
                                                    $query_id = oci_parse($con, $query); 		
                                                    $r = oci_execute($query_id);
                                                    if($r){
                                                        while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
                                                        {
                                                            echo '<div class="h5 mb-0 font-weight-bold text-gray-1200">'.$row["BMI"].'</div>';
                                                        }    
                                                    }
                                                   
                                                    ?>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text3">
                                                CURRENT WEIGHT</div>
                                                <?php
                                                    $query = "select * from member where userid = '$userid'";
                                                    $query_id = oci_parse($con, $query); 		
                                                    $r = oci_execute($query_id);
                                                    if($r){
                                                        while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
                                                        {
                                                            echo '<div class="h5 mb-0 font-weight-bold text-gray-1200">'.$row["WEIGHT"].' KG</div>';
                                                        }    
                                                    }
                                                   
                                                    ?>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

<div class="row-22" >
    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text3">TASKS COMPLETION RATE
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">90%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 90%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>


<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h1 class="m-0 font-weight-bold text-primary">Progress Report</h1>
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>Date</th>
                      <th>Carbohydrate Intake</th>
                      <th>Protein Intake</th>
                      <th>Fat Intake</th>
                      <th>Weight</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>Date</th>
                      <th>Carbohydrate Intake</th>
                      <th>Protein Intake</th>
                      <th>Fat Intake</th>
                      <th>Weight</th>
                  </tr>
              </tfoot>
              <tbody>
              <?php
                $db_sid = 
                "(DESCRIPTION =
                (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
                (CONNECT_DATA =
                    (SERVER = DEDICATED)
                    (SERVICE_NAME = musadac)
                )
                )";           

                $db_user = "scott";   // Oracle username e.g "scott"
                $db_pass = "tiger";    // Password for user e.g "1234"
                $con = oci_connect($db_user,$db_pass,$db_sid); 
                
                $query = "select * from log where userid = '$userid'";
                $query_id = oci_parse($con, $query); 		
                $r = oci_execute($query_id);
                if($r){
                    while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
                    {
                        echo '<tr>
                        <td>'.$row['TODAY'].'</td>
                        <td>'.$row['CARBOHYDRATE_INTAKE'].'</td>
                        <td>'.$row['FAT_INTAKE'].'</td>
                        <td>'.$row['PROTEIN_INTAKE'].'</td>
                        <td>'.$row['WEIGHT'].'</td>
                    </tr>';
                    }    
                }
                else{
                    echo '<div class="alert alert-danger" role="alert">
                    No Log
                </div>';
                
                }
                ?>
                  
              </tbody>
          </table>
      </div>
  </div>
  <div class="card shadow mb-4">
  <div class="card-header py-3">
      <h1 class="m-0 font-weight-bold text-primary">Your Plans</h1>
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>dno</th>
                      <th>Protein</th>
                      <th>Fats</th>
                      <th>Carbohydrates</th>
                      <th>Type</th>
                      <th>Exercise Name</th>
                      <th>Model</th>
                      <th>Target Muscle</th>
                      <th>Duration</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>dno</th>
                      <th>Protein</th>
                      <th>Fats</th>
                      <th>Carbohydrates</th>
                      <th>Type</th>
                      <th>Exercise Name</th>
                      <th>Model</th>
                      <th>Target Muscle</th>
                      <th>Duration</th>
                  </tr>
              </tfoot>
              <tbody>
              <?php
                $db_sid = 
                "(DESCRIPTION =
                (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
                (CONNECT_DATA =
                    (SERVER = DEDICATED)
                    (SERVICE_NAME = musadac)
                )
                )";           

                $db_user = "scott";   // Oracle username e.g "scott"
                $db_pass = "tiger";    // Password for user e.g "1234"
                $con = oci_connect($db_user,$db_pass,$db_sid); 
                
                $query = "select * from workout_plan  inner join exercise on workout_plan.dno = exercise.dno where userid = '$userid'";
                $query_id = oci_parse($con, $query); 		
                $r = oci_execute($query_id);
                if($r){
                    while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
                    {
                        echo '<tr>
                        <td>'.$row['DNO'].'</td>
                        <td>'.$row['PROTEIN'].'</td>
                        <td>'.$row['FATS'].'</td>
                        <td>'.$row['CARBOHYDRATES'].'</td>
                        <td>'.$row['TYPE'].'</td>
                        <td>'.$row['EX_NAME'].'</td>
                        <td>'.$row['MODEL'].'</td>
                        <td>'.$row['TARGET_MUSCLE'].'</td>
                        <td>'.$row['DURATION'].'</td>
                    </tr>';
                    }    
                }
                else{
                    echo '<div class="alert alert-danger" role="alert">
                    No Log
                </div>';
                
                }
                ?>
                  
              </tbody>
          </table>
      </div>
  </div>
  <script src="vendor/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery.dataTables.min.js"></script>
    <script src="vendor/dataTables.bootstrap4.min.js"></script>
    <script src="js/datatables-demo.js"></script>
</div>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>

</html>
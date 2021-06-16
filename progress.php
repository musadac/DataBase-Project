<html lang="en">
<head>
  <title>FITME-USER</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
  <link rel="stylesheet" href="user.css">
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
        <a class="nav-link" href="#">Progress Log <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="/user.php">Home</a>
  <a href="/reports.php">REPORTS</a>
  <a href="/createworkout.php">CREATE WORKOUT PLAN</a>
  <?php
      session_start();
        $userid = $_SESSION["userid"];
      ?>
</div>
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
    if($con) 
        {  } 
    else 
        { die('Could not connect to Oracle: '); } 

        if (isset($_POST["C"])){ 
            $date=$_POST["date"];
            $fatintake=$_POST["fatintake"];
            $carbointake=$_POST["carbointake"];
            $prointake=$_POST["prointake"];
            $weight=$_POST["weight"];
            $query = "insert into log values ('$userid','$date','$carbointake','$fatintake','$prointake','$weight')";
            $query_id = oci_parse($con, $query); 		
            $r = oci_execute($query_id);
            if($r){
                echo '<div class="alert alert-success" role="alert">
                Data Logged
              </div>'; 
              $query = "select height  from member where userid = '$userid'";
              $query_id = oci_parse($con, $query); 		
              $r = oci_execute($query_id);
              $x=oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
              $height = $x[0];
              $height = $height + 1;  
              $bmi = ((int)$weight/((int)$height/39.37));
              $query = "update member
              SET BMI ='$bmi',weight = '$weight'
              where userid ='$userid'";
            $query_id = oci_parse($con, $query); 		
            $r = oci_execute($query_id);   
            }
            else{
                echo '<div class="alert alert-danger" role="alert">
                Error
            </div>';
            
            }
        }
        
    ?>

<div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Log</h3>
                                </div>
                                <h6 class="h5 mb-0">Just Do.</h6>
                                <p class="text-muted mt-2 mb-5">With Sincerity.</p>
                                <form method="POST">
                                    <div class="form-group  mb-5">
                                        <label for="yourName">Date</label>
                                        <input type="date" placeholder="in Kgs" class="form-control" name="date" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="fatintake">Fats Intake</label>
                                        <input type="text" class="form-control" name="fatintake" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="prointake">Protein Intake</label>
                                        <input type="text" class="form-control" name="prointake" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="carbointake">Carbohydrtae Intake</label>
                                        <input type="text" class="form-control" name="carbointake" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="weight">Weight</label>
                                        <input type="text" class="form-control" name="weight" />
                                    </div>
                                    
                                    <button type="submit" class="btn btn-theme" name="C">LOG</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
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

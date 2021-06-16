<html lang="en">
<head>
  <title>FITME-USER</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
        <a class="nav-link" href="#">Create Workout Plan <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav">
      <?php
      session_start();
        $userid = $_SESSION["userid"];
        echo ' <li class="nav-item active"><a class="nav-link" href="#">Welcome '.$userid.'<span class="sr-only">(current)</span></a></li>';
      ?>

    </ul>
  </div>
</nav>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="/user.php">Home</a>
  <a href="#">REPORTS</a>
  <a href="/progress.php">Create Workout Plan</a>
</div>


<div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
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

                                    if (isset($_POST["C"])){ 
                                      $userid = $_SESSION["userid"];
                                      $fatintake=$_POST["fatintake"];
                                      $type=$_POST["type"];
                                      $prointake=$_POST["prointake"];
                                      $carbointake=$_POST["carbointake"];
                                      $Name=$_POST["Name"];
                                      $targetmuscle=$_POST["targetmuscle"];
                                      $Duration=$_POST["Duration"];
                                      $Equipment=$_POST["Equipment"];
                                      $val = "select COALESCE(MAX(dno), 0) from workout_plan";
                                      $val=oci_parse($con, $val); 
                                      $w=oci_execute($val);
                                      $x=oci_fetch_array($val, OCI_BOTH+OCI_RETURN_NULLS);
                                      $new = $x[0];
                                      $new = $new + 1;
                                      
                                      $query = "insert into workout_plan(dno,userid,protein,fats,carbohydrates,type) values ('$new','$userid','$prointake','$fatintake','$carbointake','$type')";
                                      $query_id = oci_parse($con, $query); 		
                                      $r = oci_execute($query_id);
                                      $query = "insert into exercise values ('$new','$Name','$Equipment','$targetmuscle','$Duration')";
                                      $query_id = oci_parse($con, $query); 		
                                      $r = oci_execute($query_id);
                                      echo '<div class="alert alert-primary" role="alert">Workout Created </div>';
                                      }
                              ?>
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Create Workout</h3>
                                </div>
                                <h6 class="h5 mb-0">Just Do.</h6>
                                <p class="text-muted mt-2 mb-5">Create a Plan</p>
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="fatintake">Workout Type</label>
                                        <input list=qqww class="form-control" name="type" />
                                        <datalist id="qqww" >
                                                <option value="Daily"> </option>
                                                <option value="Weekly"> </option>
                                        </datalist>
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

                                    <h6 class="h5 mb-0">Excercises</h6>
                                    <h6 class="h5 mb-0">-----------------------------------------</h6>
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input type="text" class="form-control" name="Name" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="targetmuscle">Target Muscle</label>
                                        <input list='descris' class="form-control" name="targetmuscle" />
                                        <datalist id="descris" >
                                                <option value="Abs"> </option>
                                                <option value="Triceps"> </option>
                                                <option value="Biceps"> </option>
                                                <option value="Chest"> </option>
                                        </datalist>
                                      </div>
                                    <div class="form-group mb-5">
                                        <label for="Duration">Duration</label>
                                        <input type="text" class="form-control" name="Duration" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="Equipment">Equipment</label>
                                        <input list ="qqqq" class="form-control" name="Equipment" />
                                        <datalist id="qqqq" >
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
                                          $query = "select * FROM equipment";
                                          $query_id = oci_parse($con, $query); 		
                                          $r = oci_execute($query_id); 
                                          while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
                                          { 
                                            echo'<option value="'.$row['MODEL'].'">'.$row['NAME'].' </option>';
                                             echo $row[1] ;
                                          }
                                          

                                        ?>
                                        </datalist>
                                    </div>
                                    
                                    <h6 class="h5 mb-0">-----------------------------------------</h6>

                                    </div>
                                    <div class="aaa" >
                                    <button type="button" onclick='add()' name="add" name="add" class="btn btn-theme">Add More</button>
                                    <br><p>&nbsp;</p>
                                    <button type="button" class="btn btn-theme">Remove</button>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-theme" name="C">CREATE</button>
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

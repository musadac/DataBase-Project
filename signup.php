<html lang="en">
<head>
  <title>FITME-REGISTER</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="signup.css">
  <style>
  
  </style>
</head>
<body>
<?php

$job=$_POST["Job"];
$dep=$_POST["Number"];

echo $dep." ".$job."\n";


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
      { echo "Oracle Connection Successful."; } 
   else 
      { die('Could not connect to Oracle: '); } 

      $query = "select * FROM EMP WHERE job='$job' and deptno='$dep'";
      echo $query;
      $query_id = oci_parse($con, $query); 		
      $r = oci_execute($query_id); 
      while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
      { 

          echo "<br>".$row["ENAME"]."<br>";
			    echo $row["EMPNO"]." ";
			    echo $row["ENAME"]." ";
	        echo $row["JOB"]." ";
	        echo $row["MGR"]." ";
	        echo $row["HIREDATE"]." ";
	        echo $row["SAL"]." ";
	        echo $row["COMM"]." ";
	        echo $row["DEPTNO"]." ";
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
                                <!-- <div class="alert alert-danger" role="alert">
                                This is a danger alert—check it out!
                                </div> -->
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Register</h3>
                                </div>
                                <h6 class="h5 mb-0">Just Do.</h6>
                                <p class="text-muted mt-2 mb-5">If You Really Want To Track your Fitness.</p>
                                <form novalidate>
                                    <div class="form-group">
                                        <label for="yourName">Your name</label>
                                        <input type="text" class="form-control" id="yourName" required />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Height</label>
                                        <input type="text" placeholder="in Inches" class="form-control" id="height"  required/>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Weight</label>
                                        <input type="text" placeholder="in Kgs" class="form-control" id="weight" required />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Gender</label>
                                        <input  list="descri" class="form-control" id="gender" required />
                                        <datalist id="descri" >
                                                <option value="Male"> </option>
                                                <option value="Female"> </option>
                                        </datalist>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Muscle Type</label>
                                        <input  list="descris" class="form-control" id="muscle" required />
                                        <datalist id="descris" >
                                                <option value="Abs"> </option>
                                                <option value="Triceps"> </option>
                                                <option value="Biceps"> </option>
                                                <option value="Chest"> </option>
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="email" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="password" />
                                    </div>
                                    
                                    <button type="submit" class="btn btn-theme">Register</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-inline-block">
                            
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-muted text-center mt-3 mb-0">Already have an account? <a href="login.php" class="text-primary ml-1">login</a></p>
        </div>
    </div>
    <script>
    (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
    </script>
</div>
</body>
</html>

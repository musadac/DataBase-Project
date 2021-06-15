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
                                if($con) 
                                    {  } 
                                else 
                                    { die('Could not connect to Oracle: '); } 

                                    if (isset($_POST["C"])){ 
                                        $userid=$_POST["userid"];
                                        $height=$_POST["height"];
                                        $weight=$_POST["weight"];
                                        $date=$_POST["date"];
                                        $gender=$_POST["gender"];
                                        $muscle=$_POST["muscle"];
                                        $email=$_POST["email"];
                                        $password=$_POST["password"];
                                        $bmi = ((int)$weight/((int)$height/39.37));
                                        $query = "insert into member values ('$userid','$gender','$email','$date','$weight','$height','','$muscle','$bmi','$password')";
                                        $query_id = oci_parse($con, $query); 		
                                        $r = oci_execute($query_id);
                                        if($r){
                                            echo '<div class="alert alert-success" role="alert">
                                            Registered <a href="/login.php">Login</a>
                                         </div>';      
                                        }
                                        else{
                                            echo '<div class="alert alert-danger" role="alert">
                                            Already Registered
                                        </div>';
                                        
                                        }
                                    }
                                    
                                ?>
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Register</h3>
                                </div>
                                <h6 class="h5 mb-0">Just Do.</h6>
                                <p class="text-muted mt-2 mb-5">If You Really Want To Track your Fitness.</p>
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="yourName">UserID</label>
                                        <input type="text" class="form-control" name="userid" required />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Height</label>
                                        <input type="text" placeholder="in Inches" class="form-control" name="height"  required/>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Weight</label>
                                        <input type="text" placeholder="in Kgs" class="form-control" name="weight" required />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Date</label>
                                        <input type="date" placeholder="in Kgs" class="form-control" name="date" required />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Gender</label>
                                        <input  list="descri" class="form-control" name="gender" required />
                                        <datalist id="descri" >
                                                <option value="Male"> </option>
                                                <option value="Female"> </option>
                                        </datalist>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Muscle Type</label>
                                        <input  list="descris" class="form-control" name="muscle" required />
                                        <datalist id="descris" >
                                                <option value="Abs"> </option>
                                                <option value="Triceps"> </option>
                                                <option value="Biceps"> </option>
                                                <option value="Chest"> </option>
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" name="email" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" name="password" />
                                    </div>
                                    
                                    <button type="submit" class="btn btn-theme" name="C">Register</button>
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

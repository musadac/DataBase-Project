<html lang="en">
<head>
  <title>FITME-LOGIN</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="login.css">
  <style>
  
  </style>
</head>
<body>
<div class="sidenav">
         <div class="login-main-text">
            <h2>FITME<br> Login</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
            <?php
               session_start();
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
                        $password=$_POST["password"];
                        $query = "select userid from member where userid ='$userid'";
                        $query_id = oci_parse($con, $query); 		
                        $r = oci_execute($query_id);
                        $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
                        if(sizeof($row)>1){
                           $query = "select userid,password from member where password ='$password' AND userid = '$userid'";
                           $query_id = oci_parse($con, $query); 		
                           $r = oci_execute($query_id);
                           $row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
                           if(sizeof($row)>1){
                              session_start();
                              $_SESSION["userid"] = $userid;
                              header("Location: http://localhost/user.php", true, 301);
                              exit();
                           }
                           else{
                              echo '<div class="alert alert-danger" role="alert">
                              Password InValid for userID
                              </div>';
                           
                           }
                           
                        }
                        else{
                           echo '<div class="alert alert-danger" role="alert">
                           Not Valid userID
                        </div>';
                        
                        }
                  }
                  
               ?>
               <form method="POST">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" placeholder="User Name" name="userid">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                  <button type="submit" class="btn btn-black" name="C">Login</button>
                  <button  type = 'button' class="btn btn-secondary" onClick="window.open('signup.php','_self')">SignUp</button>
               </form>
            </div>
         </div>
      </div>

</body>
</html>
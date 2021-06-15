<html>
<head>
    <!-- <link rel="stylesheet" href="form-page2.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
</head>
<body>
<div class="mainbody">
        <div class="circle__wrapper">
            <div class="circle" ></div>
          </div>
          <div class="topicholder">
             <h1 class="Topic">Delete of the Employee</h1>
          </div>
          <div class="formcontainer">
              <form  method="post" >
                <input type="text" placeholder="Enter Employee Number" class="Empname"  name ="Empname" />
                <input type="submit" placeholder="buttonsa" class="buttonsa2"  value="Delete" name="C" />
              </form>
          </div>
    </div>


<?php


if (isset($_POST["C"])){
    $search=$_POST["Empname"];
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

      $query = "delete  from emp where EMPNO = '$search'";
      $query_id = oci_parse($con, $query); 		
      $r = oci_execute($query_id);
      if($r) 
      { echo '<script>alert("Deletion Succes")</script>'; } 
     else 
      { die('Could not Insert'); }  
}





?>
</body>
</html>
<html>
<head>
    
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
             <h1 class="Topic">Records of the Employee</h1>
          </div>
          <div class="formcontainer">
              <form method="post" >
                <input type="text" placeholder="Emp_Name" class="Job"  name ="Job"/>
                <input type="text" placeholder="Emp_Num" class="Depno"  name ="Depno" />
                <input type="text" placeholder="JobTitile" class="JobTitile"  name ="JobTitile" />
                <input type="text" placeholder="ManagerID" class="ManagerID"  name ="ManagerID" />
                <input type="text" placeholder="HireDate" class="HireDate"  name ="HireDate" />
                <input type="text" placeholder="Salary" class="Salary"  name ="Salary" />
                <input type="text" placeholder="Commission" class="Commission"  name ="Commission" />
                <input type="text" placeholder="Dept_No_" class="Dept_No_"  name ="Dept_No_" />
                <input type="submit" placeholder="buttonsa" class="buttonsa"  value="Update Record" name="B" />


              </form>
              <form  method="post" >
                <input type="text" placeholder="Enter Employee Number" class="Empname"  name ="Empname" />
                <input type="submit" placeholder="buttonsa" class="buttonsa2"  value="Search" name="C" />
              </form>
          </div>
    </div>


<?php
if (isset($_POST["B"])){
    $name=$_POST["Job"];
    $dep=$_POST["Depno"];
    $JobTitile=$_POST["JobTitile"];
    $ManagerID=$_POST["ManagerID"];
    $HireDate=$_POST["HireDate"];
    $Salary=$_POST["Salary"];
    $Commission=$_POST["Commission"];
    $Dept_No_=$_POST["Dept_No_"];
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

      $query = "insert into EMP values ('$dep','$name','$JobTitile','$ManagerID',to_date('$HireDate','dd/mm/yyyy'),'$Salary','$Commission','$Dept_No_')";
      $query_id = oci_parse($con, $query); 		
      $r = oci_execute($query_id);
      if($r) 
      { echo '<script>alert("Insertion Succes")</script>'; } 
     else 
      { die('Could not Insert'); }   
}

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

      $query = "select * from emp where EMPNO = '$search'";
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
}





?>
</body>
</html>
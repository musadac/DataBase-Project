<html>

<head>
<title>Database connection </title>
</head>

<body>
<?php  // creating a database connection 


   $db_sid ="(DESCRIPTION =
   (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
   (CONNECT_DATA =
     (SERVER = DEDICATED)
     (SERVICE_NAME = musadac)
   )
 )";           // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
  
   $db_user = "scott";   // Oracle username e.g "scott"
   $db_pass = "tiger";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo "Oracle Connection Successful."; } 
   else 
      { die('Could not connect to Oracle: '); } 
      

	 $q = "select * from emp";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 //$rs_arr = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
	 //echo"<br>"; 	 
	 //print_r($rs_arr); 
	 echo"<hr>"; 
	 while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
	 { 
		echo $row['ENAME']." ".$row['SAL']."<br>"; 
	 }
?>

</body>
</html>
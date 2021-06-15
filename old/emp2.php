<html>

<head>
<title>Database connection </title>
</head>


<?php  // creating a database connection 

   $db_sid = 
   "(DESCRIPTION =
   (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
   (CONNECT_DATA =
     (SERVER = DEDICATED)
     (SERVICE_NAME = musadac)
   )
 )
";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
  
   $db_user = "scott";   // Oracle username e.g "scott"
   $db_pass = "tiger";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo "Oracle Connection Successful."; 
		} 
   else 
      { die('Could not connect to Oracle: '); } 
  
      
      $sql_select="select empno,ename,job, mgr, to_char(hiredate,'dd/mm/yyyy') hiredate, sal, comm, deptno".
                  " from emp".
                  " where empno = 7900";
				  

			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
	      while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
			
        	echo "<br>".$row["ENAME"]."<br>";
			$empno = $row["EMPNO"];
			$ename = $row["ENAME"];
	        $job = $row["JOB"];
	        $mgr = $row["MGR"];
	        $hiredate = $row["HIREDATE"];
	        $sal = $row["SAL"];
	        $comm = $row["COMM"];
	        $deptno = $row["DEPTNO"];

		  } 
?>
<body>
<hr>
<h2>Employee data</h2>

			<table border="2">
			<tr>
				<td width="200" align="left">Employee#</td>
				<td width="200"> <?php echo $empno ?></td>
			</tr>
			<tr>
				<td width="200" align="left">Employee Name</td>
				<td width="200"><?php echo $ename ?></td>
			</tr>	
			<tr>
				<td width="200" align="left">Job Title</td>
				<td width="200"><?php echo $job ?></td>
			</tr>
			<tr>
				<td width="200" align="left">Manager ID</td>
				<td width="200"><?php echo $mgr ?></td>
            </tr>
			<tr>
				<td width="200" align="left">Hire Date</td>
				<td width="200"><?php echo $hiredate ?></td>
			</tr>
			<tr>
				<td width="200" align="left">Salary</td>
				<td width="200"><?php echo $sal ?></td>
			</tr>
			<tr>
				<td width="200" align="left">Commission</td>
				<td width="200"><?php echo $comm ?></td>
			</tr>
			<tr>
				<td width="200" align="left">Department No</td>
				<td width="200"><?php echo $deptno ?></td>
			</tr>
			</table>

</body>
</html>
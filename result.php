<?php
$conn=new mysqli("localhost" , "root" ,"" , "loom_management_system");

 

if (isset($_POST['cloth']) || isset($_POST['emp_id']) || isset($_POST['loom_number'])){

	$pcloth=$_POST['cloth'];
 	$pid=$_POST['emp_id'];
 	$pnumber=$_POST['loom_number'];
		$sqlr="SELECT * FROM regestration WHERE (emp_id='$pid')";

		$result= $conn->query($sqlr);

		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				
				echo"<br>" ." ___________________- ID:- " . $row["emp_id"]. "<br>" . " ___________________-NAME:-" . $row["first_name"]. ' ' . $row["last_name"] ."<br>" . " ___________________-Production:-" . $row["production"] ;
			} 
		}

				$sqlq="SELECT * FROM management WHERE (loom_number='$pnumber')";

		$result= $conn->query($sqlq);

		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				
				echo"<br>" ." ___________________- Loom No:- " . $row["loom_number"]. "<br>" . " ___________________-Cotton:-" . $row["cotton"]. "<br>" . " ___________________-Linen:-" . $row["linen"] . "<br>" . " ___________________-Silk:-" . $row["silk"]. "<br>" . " ___________________-Production:-" . $row["production"] ;
			} 
		}

}else {echo"fill form details";}


?>

<html>
<title>RESULT</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" type = "text/css" href = "style.css">

</head>
<body>

<div class="sidenav">
  <a href="1.php">HOME</a>
  <a href="2.php">REG.</a>
  <a href="loom.php">MNG</a>
  <a href="result.php">RESULTS</a>
</div>

<div id="container">

 <h1 style="font-family:times roman;solid #443f3f">     LOOM MANAGMENT </h1><BR>
 
<center><h1 style="font-family:times roman;  solid #443f3f"> RESULT </h1><br></Center>
<form method="POST" action="result.php">
<br>
<label>Cloth</label>
<input type="text" name="cloth"/><br><br>

<label>EMP_ID</label>
<input type="number" name="emp_id"/><br><br>

<label>LOOM_No.</label>
<input type="number" name="loom_number"/><br><br>

<input type="reset" name="Reset"/><input type="submit" name="submit"/>
</body>
</center>
</html>
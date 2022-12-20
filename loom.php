<?php
session_start();
$conn=new mysqli("localhost" , "root" ,"" , "loom_management_system");

if (isset($_SESSION['message'])){
echo $_SESSION['message'];
}


if (isset($_POST['loom'])){
	$n=$_POST['loom'];
  $_SESSION['test']=$n;
     

	$sqlr="SELECT * FROM temp WHERE loom_number='$n'";
  $result= $conn->query($sqlr);

  if($result->num_rows>0){
    //echo "loom Active";
   header("Location: loomup.php");
   exit;
    }
  else{
    echo "Not loom Active";
    header("Location: 3.php");
    exit;
    }
}
else{echo "__-Please enter loom no.";}

?>



<html>
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
 <h1 style="font-family:times roman; solid #443f3f">     LOOM MANAGMENT </h1><BR>
 
 <form method="POST" action="#">
 
  <br><div class="userinput">
   <label> LOOM  </label>
   <input type="number" name="loom"/>
  </div>


  <div style="text-align:right">
   <input type="reset" name="reset"/>
   <input type="submit" name="submit"/>   
  </div><br><br>

 </form>
 
 </div>
</body>
</html>
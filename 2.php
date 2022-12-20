<?php
$server="localhost";
$dbuser="root";
$dbpass="";
$db="loom_management_system";
$conn=new mysqli($server,$dbuser,$dbpass,$db);

if($conn->connect_error){
echo "connection failed" . $conn->connect_error;
}else
{echo "connection est.";}


if (isset($_POST['emp_id'])){

$phpempid=$_POST['emp_id'];
$phpfname=$_POST['first_name'];
$phplname=$_POST['last_name'];
$phpdates=$_POST['dates'];
$phpemail=$_POST['email'];
$phpgender=$_POST['gender'];
$phppnumber=$_POST['phone_number'];
$phpaddress=$_POST['address'];
$phppaddress=$_POST['permanent_address'];


      $sql="INSERT INTO regestration (emp_id,first_name,last_name,dates,email,gender,phone_number,address,permanent_address) VALUES ('$phpempid','$phpfname','$phplname','$phpdates','$phpemail','$phpgender','$phppnumber','$phpaddress','$phppaddress')";
      
      if ($conn->query($sql)){
        echo "ENC";
      }else{echo "fail" . $sql . $conn->error;}
 }
else{ echo "ff";}
?>

<html>
<title>REGISTRATION</title>
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
 <h3 style="font-family:times roman;  solid #443f3f"> EMPLOYEE REGISTRATION </h3><BR>
 
 <form method="POST" action="#">
 
 <div class="userinput">
   <label> Emp ID  </label>
   <input type="text" name="emp_id"/>
  </div>
  <div class="userinput">
   <label> First Name  </label>
   <input type="text" name="first_name"/>
  </div>
 <div class="userinput">
   <label> Last Name  </label>
   <input type="text" name="last_name"/>
  </div>
 <div class="userinput">
   <label> DOB </label>   
   <input id="A" type="date" name="dates"/>
  </div>

 <div class="userinput">
   <label> Email </label>   
   <input type="text" name="email"/>
  </div>
 <div class="userinput">
   <label> Gender </label>
   <input type="radio" name="gender" value="Male"/> Male
   <input type="radio" name="gender"value="Female"/> Female    
  </div>
<div class="userinput">
   <label>Phone number</label>   
   <input type="text" name="phone_number"/>
  </div>
<div class="userinput">
   <label> Address </label>   
   <input type="text" name="address"/>
  </div>
<div class="userinput">
   <label>P.Address</label>   
   <input type="text" name="permanent_address"/>
  </div>
  <div style="text-align:center">
   <input type="reset" name="reset"/>
   <input type="submit" name="submit"/>   
  </div><br><br>

 </form>
 
 </div></div>     
</body>
</html>

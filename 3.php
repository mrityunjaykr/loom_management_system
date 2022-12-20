<?php
session_start();

$server="localhost";
$dbuser="root";
$dbpass="";
$db="loom_management_system";
$conn=new mysqli($server,$dbuser,$dbpass,$db);

if($conn->connect_error){
echo "connection failed" . $conn->connect_error;
}else
{echo "connection sc";}

if (isset($_POST['emp_id'])){

      $phpempid=$_POST['emp_id'];
      $phpempname=$_POST['emp_name'];
      $phploomnumber=$_POST['loom_number'];
      $phpstartreading=$_POST['start_reading'];
     //@ $phpstopreading=$_POST['stop_reading'];
      $phptype=$_POST['type'];
      $phpdate=$_POST['date'];
      $phpshift=$_POST['shift'];

          $sql="INSERT INTO temp (emp_id,emp_name,loom_number,start_reading,type,dates,shift) VALUES ('$phpempid','$phpempname','$phploomnumber','$phpstartreading','$phptype','$phpdate','$phpshift')";

      if ($conn->query($sql)){
        $_SESSION['message'] = 'Loom No. ' . $phploomnumber . 'is active';
        header("Location: loom.php");
      }else{echo "error" . $sql . $conn->error;}
}else {echo"Fill frm";}
?>


<html>
<title>MANAGEMENT</title>>
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
 
 <form method="POST" action="#">
 
  <br><div class="userinput">
   <label> EMP Id  </label>
   <input type="text" name="emp_id"/>
  </div>
 <div class="userinput">
   <label> EMP Name  </label>
   <input type="text" name="emp_name"/>
  </div>
 <div class="userinput">
   <label> LOOM Number </label>   
   <input id="A" type="number" name="loom_number" value="<?php echo $_SESSION['test'] ?>" />
  </div>

 <div class="userinput">
   <label> Start Reading </label>   
   <input type="number" name="start_reading"/>
  </div>
 
<div class="userinput">
   <label> Type </label>   
   <input type="text" name="type"/>
  </div>
<div class="userinput">
   <label>Date</label>   
   <input type="text" name="date" value="<?php echo date("d.m.Y") ?>" />
  </div>
<div class="userinput">
   <label>Shift</label>   
   <input type="text" name="shift"/>
  </div>

  <div style="text-align:right">
   <input type="reset" name="reset"/>
   <input type="submit" name="submit"/>   
  </div><br><br>

 </form>
 
 </div>
</body>
</html>
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
{echo "";}
$tmploom=$_SESSION['test'];
@$stopreading=$_POST['end_reading'];
if ($tmploom){

         

        $sqlr="SELECT * FROM temp WHERE loom_number='$tmploom'";

        $result= $conn->query($sqlr);

        if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
           
                 $phpempid=$row['emp_id'];
            $phpempname=$row['emp_name'];
            //$phploomnumber=$row['loom_number'];
            $phpstartreading=$row['start_reading'];
            //$phpstopreading=$row['stop_reading'];
            $phptype=$row['type'];
            $phpdate=$row['dates'];
            $phpshift=$row['shift']; 

          } 
        }
          if ($stopreading) {
                   
                   $sqlr="UPDATE temp SET stop_reading='$stopreading' where loom_number='$tmploom'";
                   if ($conn->query($sqlr)){
                      echo "Updated Temp";
                    }else{echo "error";}

                    $prod=$stopreading-$phpstartreading;
                                  $sqlu="UPDATE management SET production=production+'$prod', $phptype=$phptype+'$prod' WHERE loom_number='$tmploom'";
                                  if ($conn->query($sqlu)) {
                                      echo " Production Updated";
                                     } else {echo "error" . $sqlu . $conn->error;} 


                                     $sqlt="UPDATE regestration SET production=production+'$prod' WHERE emp_id='$phpempid'";
                                  if ($conn->query($sqlt)) {
                                      echo " Production Updated in regestration";
                                     } else {echo "error" . $sqlu . $conn->error;} 

                                     $sqld = "DELETE FROM temp WHERE loom_number='$tmploom'";
                                     if ($conn->query($sqld)) {
                                      echo "___________________________ TMP DATA DELETED";
                                      $_SESSION['message'] = 'Loom No. ' . $phploomnumber . 'is inactive';
                                      header("Location: loom.php");
                                     } else {echo "error" . $sqlu . $conn->error;} 


                }else{echo"___________________-Insert your End Reading";}
}else {echo"Fill loom No";}               
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
 
 <form method="POST" action="#">
 
  <br><div class="userinput">
   <label> EMP Id:- </label>
   <?php echo $phpempid; ?>
  </div>


 <div class="userinput">
   <label> EMP Name:- </label>
   <?php echo $phpempname; ?>
  </div>


 <div class="userinput">
   <label> <h3>LOOM Number:- </h3></label>   
   <?php echo $tmploom ?>
  </div>


 <div class="userinput">
   <label> Start Reading:- </label>   
   <?php echo $phpstartreading; ?>
  </div>


 <div class="userinput">
   <label><h3> End Reading:- </h3></label>
   <input type="number" name="end_reading"/>     
  </div>


 <div class="userinput">
   <label> Type:- </label>   
   <?php echo $phptype; ?>
  </div>


 <div class="userinput">
   <label>Date:- </label>   
   <?php echo $phpdate; ?>
  </div>


 <div class="userinput">
   <label>Shift:- </label>   
   <?php echo $phpshift; ?>
  </div>

  <div style="text-align:right">
   <input type="reset" name="reset"/>
   <input type="submit" name="submit"/>   
  </div><br><br>

 </form>
 
 </div>
</body>
</html>
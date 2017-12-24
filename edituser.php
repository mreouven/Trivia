<?php

require_once 'templates/header.php';

if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the test!";
  header("location: error.php");    
}
else if ( $_SESSION['admin'] != 2 ) {
  $_SESSION['message'] = "Super Admin Only!";
  header("location: error.php");    
}
echo  '<br/><br/>';

?>

<html>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<body>
<style type="text/css">
  #spec{
    color: #c03939 !important;
  }
  #formu{
    text-align: center !important; 

  }
body {
    background-image: -moz-linear-gradient(top, rgba(23, 24, 32, 0.95), rgba(23, 24, 32, 0.95)), url(img/overlay.png);
    background-image: -webkit-linear-gradient(top, #3bc087, #428bca), url(img/overlay.png);}

  body, input, select, textarea {
    color: rgb(14, 13, 13) !important ;
    text-align: center !important; 

}
input[type="text"], input[type="password"], input[type="email"], select, textarea {

  }
  :required {
   border: 1px solid #3bc087;
}
</style>
  <center>
<P>&nbsp;</P>
<section id="formu">
<B>Admin area - edit the quiz</B>
<?php
require 'templates/db.php';

if(isset($_GET['id'])){
  $id=$_GET['id'];
}
else{
  header('edituserlist.php');
}


if(isset($_POST['update']))
{
$admin=$_POST['admin'];
$active=$_POST['active'];
$id=$_POST['id'];

$sql = "UPDATE users SET active='$active',admin='$admin' WHERE id=$id";
$result = $mysqli->query($sql);
echo "<br><br>The user has been succesfully updated.<br><br>\n";
}
else if(isset($id)){
	$result = $mysqli->query("SELECT * FROM users WHERE id=$id");
	$myrow = $result->fetch_assoc();
?>


<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
<input type="hidden" name="id" value="<?php echo $myrow["id"]?>">
    <b>name</b><br>
    <input required="required" type="Text" name="name" value='<?php echo $myrow["first_name"]; echo " ";  echo $myrow["last_name"];?>' size="50" disabled="disabled">
    <br><br>
    <b>mail</b><br>
    <input required="required" type="Text" name="mail" value="<?php echo $myrow["email"]?>" size="50" disabled="disabled">
    <br><br>
    
    <b>Email Verified</b><br>
       <select name="active" value="<?php echo $myrow["active"]?>">
           <optgroup label="Answer">
               <option value="0" <?php if($myrow["active"]==0){ echo "selected";}?> >Email non verifier</option>
			         <option value="1" <?php if($myrow["active"]==1){ echo "selected";}?> >Email verifier</option>
           </optgroup>
        </select>
        <br>
     <br><b>Admin/ user</b><br>
       <select name="admin" value="<?php echo $myrow["admin"]?>">
           <optgroup label="Answer">
               <option value="0" <?php if($myrow["admin"]==0){ echo "selected";}?> >User</option>
               <option value="1" <?php if($myrow["admin"]==1){ echo "selected";}?> >Admin</option>
               <option value="2" <?php if($myrow["admin"]==2){ echo "selected";}?> >Super Admin</option>
           </optgroup>
        </select>
	
	<input type="Text" name="ids" value="<?php echo $myrow["id"]?>" style='display:none'> 
    <br>
    <br>

<input type="Submit" name="update" value="Update information"></form>
<?php
;
}
?>
<a id="spec" href="edituserlist.php">Back to list of user</a>

</center>
</section>
</body>
</html>
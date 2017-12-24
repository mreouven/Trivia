<?php

require_once 'templates/header.php';

if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the test!";
  header("location: error.php");    
}
else if ( $_SESSION['admin'] == 0) {
  $_SESSION['message'] = "Admin Only!";
  header("location: error.php");    
}
echo  '<br/>';

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
require 'db.php';

if(isset($_GET['id'])){$id=$_GET['id'];}

if(isset($_POST['submit'])){
$question=$_POST["question"];
$opt1=$_POST['opt1'];
$opt2=$_POST['opt2'];
$opt3=$_POST['opt3'];
$answer=$_POST['answer'];

$sql = "INSERT INTO question (question, r1, r2, r3, reponse) VALUES ('$question','$opt1','$opt2','$opt3','$answer')";
$result = $mysqli->query($sql);
echo "<br><br>Question added to quiz.<br><br>";


}
else if(isset($_POST['update']))
{
$question=$_POST["question"];
$opt1=$_POST['opt1'];
$opt2=$_POST['opt2'];
$opt3=$_POST['opt3'];
$answer=$_POST['answer'];	
$id=$_POST['id'];
$sql = "UPDATE question SET question='$question',r1='$opt1',r2='$opt2',r3='$opt3',reponse='$answer' WHERE id=$id";
$result = $mysqli->query($sql);
echo "<br><br>The quiz has been succesfully updated.<br><br>\n";
}
else if(isset($id)){
	$result = $mysqli->query("SELECT * FROM question WHERE id=$id");
	$myrow = $result->fetch_assoc();
?>


<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
<input type="hidden" name="id" value="<?php echo $myrow["id"]?>">
    <b>Question:</b><br>
    <input required="required" type="Text" name="question" value="<?php echo $myrow["question"]?>" size="50">
    <br>
    <b>Response 1:</b><br>
    <input required="required" type="Text" name="opt1" value="<?php echo $myrow["r1"]?>" size="30">
    <br>
    <b>Response 2:</b><br>
    <input required="required" type="Text" name="opt2" value="<?php echo $myrow["r2"]?>" size="30">
    <br>
    <b>Response 3:</b><br>
    <input required="required" type="Text" name="opt3" value="<?php echo $myrow["r3"]?>" size="30">
    <br>
    <b>Answer</b> (must be identical to correct option):<br>
	
	      <label for="answer">Choose the correct Answer</label><br />
       <select name="answer" value="<?php echo $myrow["reponse"]?>">
           <optgroup label="Answer">
               <option value="1" <?php if($myrow["reponse"]==1){ echo "selected";}?> >1</option>
			         <option value="2" <?php if($myrow["reponse"]==2){ echo "selected";}?> >2</option>
               <option value="3" <?php if($myrow["reponse"]==3){ echo "selected";}?> >3</option>
           </optgroup>
</select>
	
	<input type="Text" name="ids" value="<?php echo $myrow["id"]?>" style='display:none'> 
    <br>
    <br>

<input type="Submit" name="update" value="Update information"></form>
<?php
;
}
else
{
?>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
    <p><br>
      <b>Question:</b><br>
      <input required="required" type="Text" name="question" size="50">
      <br>
      <b>Option 1:</b><br>
      <input required="required" type="Text" name="opt1" size="30">
      <br>
      <b>Option 2:</b><br>
      <input required="required" type="Text" name="opt2" size="30">
      <br>
      <b>Option 3:</b><br>
      <input required="required" type="Text" name="opt3" size="30">
      <br>
      <label for="answer">Choose the correct Answer</label><br />
       <select name="answer">
           <optgroup label="Answer">
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
           </optgroup> <br/></select>
      <br>
      <br>
      <input type="Submit" name="submit" value="Enter information">
    </p>
    </form>
<?php
}
?>
<a id="spec" href="editquizlist.php">Back to list of quiz questions</a>
</center>
</section>
</body>
</html>
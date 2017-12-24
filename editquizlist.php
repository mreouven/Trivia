<?php
require_once 'templates/header.php';
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the test!";
  header("location: error.php");    
}
else if ( $_SESSION['admin'] == 0 ) {
  $_SESSION['message'] = "Admin Only!";
  header("location: error.php");    
}


echo  '<br/><br/><br/>';
?>

<HTML>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<body>
  <div id="page-wrapper">

  <center>
<P>&nbsp;</P>

<style type="text/css">
	#spec{
    color: #3b4d5e !important;
  }
body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.428571429;
    color: #292d38;
    background-image: -webkit-linear-gradient(top,#3bc087, #428bca ), url(img/overlay.png);
}

</style>
<B>Trivia Admin area - edit the quiz</B>
<br><br>
  <table width="300" border="0" cellspacing="0" cellpadding="0">

        <?php
require 'db.php';

$result = $bdd->query('SELECT id, question FROM question ORDER BY id');

echo "<table>";

while ($row = $result->fetch())
{
	
	$id = $row["id"]; 
	$question = $row["question"]; 
	if ($alternate == "1") { 
	$color = "#ffffff"; 
	$alternate = "2"; 
	} 
	else { 
	$color = "#efefef"; 
	$alternate = "1"; 
	} 
	echo "<tr bgcolor=$color><td>$id:</td><td>$question</td><td>[ <a id=\"spec\" href='newques.php?id=$id'>edit</a> ]</td><td>[ <a id=\"spec\" href='deletequiz.php?id=$id' onClick=\"return confirm('Are you sure?')\">delete</a> ]</td></tr>"; 
} 
echo "</table>";
?>
        <br>
        <br>
        <a href="newques.php">Add a new question to the quiz</a></td>
    </tr>
  </table>
  <br>
  <br>
</center>
 <?php require_once'templates/footer.php' ;?>
</div>
</body>
</HTML>
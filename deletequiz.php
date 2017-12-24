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


?>

<HTML>
<style type="text/css">
	
body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.428571429;
    color: #292d38;
    background-image: -webkit-linear-gradient(top,#3bc087, #428bca ), url(img/overlay.png);
}

</style>
<center>
<?php
require 'db.php';
if(isset($_GET['id'])){$id=$_GET['id'];}

$mysqli->query("DELETE FROM question WHERE id=$id");
$mysqli->query("SET @newid=0");
$mysqli->query("UPDATE question SET id=(@newid:=@newid+1) ORDER BY id")	;
$result = $bdd->query('SELECT COUNT(*) FROM question');
$row = $result->fetch();
$count= $row['COUNT(*)'];
$mysqli->query("ALTER TABLE question AUTO_INCREMENT = $count");



echo "<P>&nbsp;</P>";

echo "<B>Admin area - delete a quiz question<br><br></B>";

echo "Question deleted<br><br>";
echo "<a href='editquizlist.php'>Back to list of quiz questions</a>";
?>
</center>
</HTML>
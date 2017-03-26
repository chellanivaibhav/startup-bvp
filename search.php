<!DOCTYPE html>
<html>
<body>
</body>
<!-- connects to database  WHERE gender=$_POST["Gender"]-->
<?php require 'connToDB.php';?>
<br>
<?php
$Gender=lcfirst($_POST["Gender"]);
$sql=$conn->prepare("SELECT * FROM property_listings WHERE 
	gender = '$Gender'");
$sql->execute();

while($row=$sql->fetch(PDO::FETCH_ASSOC)){	
	echo ($row['property_id'] . $row['rent_pm'] . $row['gender'].$row['Distance_College']);
	echo nl2br("\n");
}


?>


</body>
</html>
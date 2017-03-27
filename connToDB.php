<!-- connects to database , params(servername,databaseName,username,password)
 -->
 <?php
	$servername="localhost";
	$username="root";
	$password="astrokick";
	$dbname="trial_startup";
	try {
		$conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo "Connected Succesfully";
	}
	catch(PDOexception $e){
		echo "Connection Failed ".$e->getMessage();
	}
?>

<!DOCTYPE html>
<html>
<body>
				<div class="col-md-8"><!-- this is the searching and sort dropdown-->
					<div>
						<form action="search.php" method="post">
							<div class="dropdownbox1"><!--distance dropdown box it is  -->
								<div class="dropdown">
									<select name="Distance">
										<option value="3">1-3 km </option>
										<option value="5">3-5 km</option>
										<option value="7">5-7 km</option>

									</select>
								</div>
								<div class="dropdown">
									<select name="Gender">
										<option value="Any">Any</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
								<input type="submit" name="SUBMIT">
							</div>
						</form>

					</div>
				</div>
		<!-- connects to database  WHERE gender=$_POST["Gender"]-->
<?php require 'connToDB.php';?>
<br>
<?php

$Gender=lcfirst($_POST["Gender"]);
$DistanceUpperLimit=$_POST["Distance"];
$DistanceLowerLimit=$_POST["Distance"]-2;
if(strcmp($Gender,'any')==0){
	$sql=$conn->prepare("SELECT * FROM property_listings WHERE  Distance_College <= '$DistanceUpperLimit' AND Distance_College >= '$DistanceLowerLimit' ORDER BY Distance_College ");
}
else{
	$sql=$conn->prepare("SELECT * FROM property_listings WHERE 
		gender = '$Gender' AND Distance_College <= '$DistanceUpperLimit' AND Distance_College >= '$DistanceLowerLimit' ORDER BY Distance_College ");
}
$sql->execute();

while($row=$sql->fetch(PDO::FETCH_ASSOC)){	
	$Property_id=$row["property_id"];
	$Property_Details=$conn->prepare("SELECT property_address,property_owner_phone,property_owner_owner_name FROM property_details WHERE property_id='$Property_id'");
	$Property_Details->execute();
	$Property_Details_Result=$Property_Details->fetch(PDO::FETCH_ASSOC);

	echo '<div style="width: 400px; height: 200px; border-style: solid;">
			<div style="width: 350px; height:25px ; border-style: solid; margin-left: 25px; margin-top: 2px;">
				ADDRESS:' .$Property_Details_Result["property_address"] .'
			</div>
			<div style="width: 100px; height: 25px; border-style: solid; margin-left: 22px; margin-top: 15px; float: left;">
				RENT:' .$row["rent_pm"] .'
			</div>
			<div style="width: 100px; height: 25px; border-style: solid; margin-left: 22px; margin-top: 15px; float: left;">
				 wanted ' .$row["gender"] .' 
			</div>
			<div style="width: 100px; height:75px; border-style: solid; margin-left: 22px; margin-top: 15px; float: left;">
				<!-- photos -->
			</div>
			<div style="width: 230px; height: 25px; border-style:  solid; margin-left:22px; margin-top: 65px;">
				Distance from college:' .$row["Distance_College"] .'
			</div>
			<div>
				<!-- beds -->
			</div>
		</div>';
	/*echo nl2br("\n");*/
}


?>
</body>


</body>
</html>
<!DOCTYPE html>
<html>
<body>
				<div class="col-md-8"><!-- this is the searching and sort dropdown-->
					<div>
						<form action="search.php" method="post">
							<div class="dropdownbox1"><!--distance dropdown box it is  -->
								<div class="dropdown">
									<select name="Distance">
										<option value="1-3 km">1-3 km</option>
										<option value="3-5 km">3-5 km</option>
										<option value="5-7 km">5-7 km</option>

									</select>
									<!-- <button class="dropbtn">DISTANCE</button>
									<div class="dropdown-content">
										<a href="#">1-3 km</a>
										<a href="#">3-5 km</a>
										<a href="#">5-7 km</a>
										<a href="#">other</a>
									</div> -->
								</div>
							</div>
							<div class="dropdownbox2"><!--budget dropdown box it is  -->
								<div class="dropdown">
									<button class="dropbtn">BUDGET</button>
									<select name="Gender">
										<option value="Any">Any</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
									<!-- <div class="dropdown-content">
										<a href="#">4000-5000</a>
										<a href="#">5000-6000</a>
										<a href="#">6000-7000</a>
										<a href="#">other</a>
									</div> -->
								</div>
							</div>
							<input type="submit" name="SUBMIT">
						</form>
						<h2>OR</h2>
						<hr>
					</div>
					<div>
						<div class="searchbox"><!-- this is searching box -->
							<form class="navbar-form navbar-left" role="search">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Search">
								</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
						</div>
					</div>
				</div>
<!-- connects to database  WHERE gender=$_POST["Gender"]-->
<?php require 'connToDB.php';?>
<br>
<?php

$Gender=lcfirst($_POST["Gender"]);
$distanceUpperLimit=$_POST["Distance"];
$distanceLowerLimit=$_POST["Distance"]-2;
echo $distanceUpperLimit . $distanceLowerLimit;
$sql=$conn->prepare("SELECT * FROM property_listings WHERE 
	gender = '$Gender'");
$sql->execute();

while($row=$sql->fetch(PDO::FETCH_ASSOC)){	
	echo '<div style="width: 400px; height: 200px; border-style: solid;">
			<div style="width: 350px; height:25px ; border-style: solid; margin-left: 25px; margin-top: 2px;">
				this will have property address
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
	echo nl2br("\n");
}


?>
</body>


</body>
</html>
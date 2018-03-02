<html>
<head><title>HealthCare Providers</title></head>
<body>
	<h1 align="center">Create Appointments</h1>


<div id="form" align="center">
	
<form method="POST" >
Patient ID: <input align="center" type="number" name="patientid" />
Doctor ID: <input align="center" type="number" name="doctorid" />
Date: <input align="center" type="date" name="date" />
Time: <input align="center" type="time" name="time" />


<input type="SUBMIT" name="submit" Value="Create Appointment" />

</form>
</div>


</body>
</html>


<?php
$mysqli = NEW mysqli("localhost", "root", "12345", "healthcare");

if(isset($_POST['submit']))
{

	$patientid = (int)$_POST['patientid'];
	$doctorid = (int)$_POST['doctorid'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$scheduleid ='NULL';


	//$providers = $mysqli->query(
	//"insert into ");

	if( empty($_POST['patientid']) || empty($_POST['doctorid']) || empty($_POST['date']) || empty($_POST['time'])) //will make sure you cannot search empty space	
 		{
	 		echo "Missing data to schedule appointment.";
 		}

 	$sql = "insert into schedule VALUES ($scheduleid, $patientid, $doctorid, '$date', '$time')";

 	if(mysqli_query($mysqli, $sql))
 	{
 		echo "Appointment has been added.";
 	}
 	else
 	{
 		$output = "Can't create appointment.";

 	}

}

?>

<?php

echo $output;
//echo $search;
//echo $doctorid;
//echo $date;
//echo $time;

?>
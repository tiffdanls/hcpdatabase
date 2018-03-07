<html>
<head><title>HealthCare Providers</title></head>
<body>
	<h1 align="center">Add Patient</h1>


<div id="form" align="center">
	
<form method="POST" >
First Name: <input align="center" type="TEXT" name="f_name" />
Last Name: <input align="center" type="TEXT" name="l_name" />
DateofBirth: <input align="center" type="date" name="date" />
DoctorID: <input align="center" type="number" name="doctorid" />

<input type="SUBMIT" name="submit" Value="Add New Patient" />

</form>
</div>


</body>
</html>


<?php
$mysqli = NEW mysqli("localhost", "root", "12345", "healthcare");

if(isset($_POST['submit']))
{

	//$patientid = (int)$_POST['patientid'];
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$date = $_POST['date'];
	$doctorid = (int)$_POST['doctorid'];


	//$providers = $mysqli->query(
	//"insert into ");

	if( empty($_POST['f_name']) || empty($_POST['l_name'])|| empty($_POST['date']) || empty($_POST['doctorid'])) //will make sure you cannot input empty space	
 		{
	 		echo "Missing data to add patient.";
 		}

 	//$sql = "insert into schedule VALUES ($scheduleid, $patientid, $doctorid, '$date', '$time')";
	//update patients set Symptoms = 'Headaches', Clear = 'Y' where PatientID = 1;
	//$sql = "update patients set Symptoms = '$symptoms', clear = '$clear' where PatientID = $patientid";
	//INSERT INTO `patients` VALUES (NULL,'Bobby', 'Brown', '2010-07-14', 3, NULL, NULL);
	$sql = "insert into patients values (NULL, '$f_name', '$l_name',  '$date', '$doctorid', NULL, NULL)";

 	if(mysqli_query($mysqli, $sql))
 	{
 		echo "Patient was added.";
 	}
 	else
 	{
 		$output = "Cannot add patient.";

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
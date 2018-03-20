<html>
<head><title>HealthCare Providers</title></head>
<body>
	<h1 align="center">Update Patient Record</h1>


<div id="form" align="center">
	
<form method="POST" >
Patient ID: <input align="center" type="number" name="patientid" />
Symptoms <input align="center" type="TEXT" name="symptoms" />
Insurance Clearance (Y/N) <input align="center" type="TEXT" name="clear" />



<input type="SUBMIT" name="submit" Value="Update Patient" />

</form>
</div>


</body>
</html>


<?php
$mysqli = NEW mysqli("localhost", "root", "12345", "healthcare");

if(isset($_POST['submit']))
{

	$patientid = (int)$_POST['patientid'];
	$symptoms = $_POST['symptoms'];
	$clear = $_POST['clear'];


	//$providers = $mysqli->query(
	//"insert into ");

	if( empty($_POST['patientid']) || empty($_POST['symptoms']) || empty($_POST['clear'])) //will make sure you cannot input empty space	
 		{
	 		echo "<p align = 'center'>Missing data to update patient.</p>";
 		}

 	//$sql = "insert into schedule VALUES ($scheduleid, $patientid, $doctorid, '$date', '$time')";
	//update patients set Symptoms = 'Headaches', Clear = 'Y' where PatientID = 1;
	$sql = "update patients set Symptoms = '$symptoms', clear = '$clear' where PatientID = $patientid";

 	if(mysqli_query($mysqli, $sql))
 	{
 		echo "<p align = 'center'>Patient information has been updated.</p>";
 	}
 	else
 	{
 		echo "<p align = 'center'>Can't update patient record.</p>";

 	}

}
echo "<center><a href='index.php'>Return to Home</a></center>";
?>
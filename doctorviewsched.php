<html>
<head><title>HealthCare Providers</title></head>
<body>
	<h1 align="center">Doctors View of Schedule</h1>
</body>
</html>

<div id="form" align="center">
<form method="POST">
Doctor Name: <input align="center" type="TEXT" name="search" />
<input type="SUBMIT" name="submit" Value="Search Doctor Schedule by Doctor Name" />
</form>
</div>



<?php
$mysqli = NEW mysqli("localhost", "root", "12345", "healthcare");

if(isset($_POST['submit']))
{

	$search = $_POST['search'];
	/*$providers = $mysqli->query(
	"SELECT doctors.DoctorID, doctors.doctorname,schedule.date,schedule.time
  	FROM schedule
    INNER JOIN doctors
    ON doctors.DoctorID=schedule.DoctorID
    WHERE doctors.doctorname LIKE '%$search%'");
	*/
	
	$providers = $mysqli->query(
	"SELECT DISTINCT doctors.DoctorID, doctors.doctorname,schedule.date,schedule.time, patients.PatientID, patients.FirstName, patients.LastName, patients.Symptoms, patients.Clear
  	FROM schedule	
    INNER JOIN doctors
    ON doctors.DoctorID=schedule.DoctorID
	INNER JOIN patients
	ON patients.DoctorID=doctors.DoctorID
	INNER JOIN patients AS patients2
	ON schedule.PatientID=patients2.PatientID
    WHERE doctors.doctorname LIKE '%$search%'");
	
	
	
	
	

	if(empty($_POST['search'])) //will make sure you cannot search empty space
 	{
	 	echo "<p align='center'>Doctor did not input any data.</p>";
 	}

	else
	{
 
		if($providers->num_rows > 0)
		{
				echo "<center><table border='1' width='700px'>";
        		echo "<tr>";
        		echo "<th>Doctor ID</th>";
        		echo "<th>Doctor Name</th>";
        		echo "<th>Date</th>";
        		echo "<th>Time</th>";	
				echo "<th>PatientID</th>";
				echo "<th>First Name</th>";
				echo "<th>Last Name</th>";
				echo "<th>Symptoms</th>";
				echo "<th>Insureance Cleared</th>";
				echo "</tr>";
		
			while($row = mysqli_fetch_array($providers))
			{
			

		
			    echo "<tr>";
                echo "<td>" . $row['DoctorID'] . "</td>";
                echo "<td>" . $row['doctorname'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
				echo "<td>" . $row['PatientID'] . "</td>";
				echo "<td>" . $row['FirstName'] . "</td>";
				echo "<td>" . $row['LastName'] . "</td>";
				echo "<td>" . $row['Symptoms'] . "</td>";
				echo "<td>" . $row['Clear'] . "</td>";
				echo "</tr>";
		
			}
			echo "</table></center>";
		}
		else
		{

			echo "<p align='center'>No doctors found.</p>";
		}
	}
}
echo "<br>";
echo "<center>1 - Dr. Lopez - Pediatrician</center>";
echo "<br>";
echo "<center>2 - Dr. Miles - Dermatologist</center>";
echo "<br>";
echo "<center>3- Dr. Rivera - Cardiologist</center>";
echo "<br>";
echo "<center>4 - Dr. Cooper - Allergist</center>";
echo "<br>";

echo "<center><a href='index.php'>Return to Home</a></center>";
?>
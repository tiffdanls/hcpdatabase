<html>
<head><title>HealthCare Providers</title></head>
<body>
	<h1 align="center">Patients</h1>

<div id="form" align="center">
<form method="POST">
First Name: <input align="center" type="TEXT" name="f_name" />
Last Name: <input align="center" type="TEXT" name="l_name" />
<input type="SUBMIT" name="submit" Value="Search For Patients" />
</form>
</div>


</body>
</html>



<?php
$mysqli = NEW mysqli("localhost", "root", "12345", "healthcare");

if(isset($_POST['submit']))
{

	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];

	//$patients = $mysqli->query("select * FROM patients WHERE FirstName LIKE '%$f_name%' OR LastName LIKE '%$l_name%'");
	//$patients = $mysqli->query("select * FROM patients WHERE LastName LIKE '%$l_name%'");
	  $patients = $mysqli->query("select * FROM patients WHERE FirstName LIKE '%$f_name%'");
	//if(empty($_POST['f_name'])) //will make sure you cannot search empty space
 	//{
	 	//echo "User did not input any data.";
 	//}

	//else
	//{
 
		if($patients->num_rows > 0)
		{
			echo "<center><table border='1' width='700px'>";
        	echo "<tr>";
        	echo "<th>Patient ID</th>";
        	echo "<th>FirstName</th>";
        	echo "<th>LastName</th>";
        	echo "<th>DateofBirth</th>";
        	echo "<th>HCP</th>";	
			echo "</tr>";
				
			while($row = mysqli_fetch_array($patients))
			{
			    echo "<tr>";
                echo "<td>" . $row['PatientID'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['DateOfBirth'] . "</td>";
                echo "<td>" . $row['DoctorID'] . "</td>";
				echo "</tr>";
		
			}
				echo "</table></center>";
		}
		else
		{

			echo "<p align = 'center'>That patient does not exist.</p>";
		}
		
	//}
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
<html>
<head><title>HealthCare Providers</title></head>
<body>
	<h1 align="center">HealthCare Providers</h1>
</body>
</html>

<div id="form" align="center">
<form method="POST">
<input align="center" type="TEXT" name="search" />
<input type="SUBMIT" name="submit" Value="Search For Doctors Name" />
</form>
</div>



<?php
$mysqli = NEW mysqli("localhost", "root", "12345", "healthcare");

if(isset($_POST['submit']))
{

	$search = $_POST['search'];
	$providers = $mysqli->query("select * FROM doctors WHERE DoctorName LIKE '%$search%'");

	if(empty($_POST['search'])) //will make sure you cannot search empty space
 	{
	 	echo "<p align = 'center'>User did not input any data.</p>";
 	}

	else
	{
 
		if($providers->num_rows > 0)
		{
				echo "<center><table border='1' width='700px'>";
        		echo "<tr>";
        		echo "<th>Doctor ID</th>";
        		echo "<th>Doctor Name</th>";
        		echo "<th>Doctor Phone</th>";
        		echo "<th>Doctor Specialty</th>";	
				echo "</tr>";
				
			while($row = mysqli_fetch_array($providers))
			{
			

		
		
			    echo "<tr>";
                echo "<td>" . $row['DoctorID'] . "</td>";
                echo "<td>" . $row['DoctorName'] . "</td>";
                echo "<td>" . $row['Phone'] . "</td>";
                echo "<td>" . $row['Specialty'] . "</td>";
				echo "</tr>";
		
			}
			echo "</table></center>";
		}
		else
		{

			echo "<p align = 'center'>There are no matches for that.</p>";
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
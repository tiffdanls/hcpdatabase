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
	 	echo "User did not input any data.";
 	}

	else
	{
 
		if($providers->num_rows > 0)
		{

			while($row = mysqli_fetch_array($providers))
			{
			
				echo "<table>";
        		echo "<tr>";
        		echo "<th>Doctor ID</th>";
        		echo "<th>Doctor Name</th>";
        		echo "<th>Doctor Phone</th>";
        		echo "<th>Doctor Specialty</th>";	
				echo "</tr>";
		
		
			    echo "<tr>";
                echo "<td>" . $row['DoctorID'] . "</td>";
                echo "<td>" . $row['DoctorName'] . "</td>";
                echo "<td>" . $row['Phone'] . "</td>";
                echo "<td>" . $row['Specialty'] . "</td>";
				echo "</tr>";
		
			}
		}
		else
		{

			$output = "There are no matches for that.";
		}
	}
}

?>

<?php

echo $output;

?>
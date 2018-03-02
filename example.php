<form method="POST">
<input type="TEXT" name="search" />
<input type="SUBMIT" name="submit" Value="Search For Doctors" />
</form>


<?php
$output = NULL;

if(isset($_POST['submit']))
{

$mysqli = NEW mysqli("localhost", "root", "12345", "healthcare");

$search = $mysqli->real_escape_string($_POST['search']);

//query the database for doctors that match search result, and return doctor name and id 
$resultSet = $mysqli->query("select * FROM doctors WHERE DoctorName LIKE '%$search%'");

if(empty($_POST['search'])) //will make sure you cannot search empty space
 {
	 echo "no values to search";
 }

else{
 
if($resultSet->num_rows > 0)
	{
	while($row = mysqli_fetch_array($resultSet))
		{
			
		echo "<table>";
        echo "<tr>";
        echo "<th>Doctor ID #</th>";
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
		$output = "No Results";
	}
	}
}
?>


<?php

echo $output;

?>
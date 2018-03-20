<html>
<head><title>HealthCare Providers</title></head>
<body>
	<h1 align="center">Login</h1>
</body>
</html>

<div id="form" align="center">
<form method="POST">
User Name: <input align="center" type="TEXT" name="user" />
Password: <input align="center" type="password" name="password" />
<input type="SUBMIT" name="submit" Value="login" />
</form>
</div>
</html>


<?php

$output = NULL;
//$mysqli = NEW mysqli("localhost", "root", "12345", "healthcare");

if(isset($_POST['submit']))
{

	$user = $_POST['user'];
	$password = $_POST['password'];
	
	/*$login = $mysqli->query(
	"select position from users where username = '$user' and password = '$password'";
	//select position from users where username = 'miles' and password = 'miles1';
	);
	*/
	
	
	if(empty($user) || empty ($password)) //will make sure you cannot search empty space
		{
			$output = "<p align='center'>Please enter a username and password.</p>";

		}
	else
	{
		$mysqli = NEW mysqli("localhost", "root", "12345", "healthcare");
		$login = $mysqli->query("SELECT * FROM users WHERE username = '$user' AND password = '".md5($password)."');
		
		if($login->num_rows == 0)
		{
		
			$output = "<p align='center'>Not a valid username and password.</p>";
		
		}
		
		else
		{
			
			$returnlogin = mysqli_fetch_array($login);
			$userdesc = $returnlogin['description'];
			$userpos = $returnlogin['position'];			
			//echo 'Successful login! Welcome '.$userdesc;
			echo "<p align='center'>Successful login!</p>";
			//echo "<br>";
			
			if ($userpos == "0")
			{
				echo "<p align='center'>You are a Receptionist.</p> ";
				//echo "<br>";
				echo "<p align='center'><a href = patients_final.php>View Patients</a></p>";
				echo "<p align='center'><a href = providers.php>View Doctors</a></p>";
				echo "<p align='center'><a href = createappts.php>Create Appointments</a></p>";
				echo "<p align='center'><a href = updatepatient.php>Update Patient</a></p>";
			}
			else 
			{
				echo "<p align='center'>You are a doctor.</p> ";
				echo "<p align='center'><a href = doctorviewsched.php>View Doctor's Schedule</a></p>";
				echo "<p align='center'><a href = updatepatient.php>Update Patient</a></p>";
				echo "<p align='center'><a href = patients_final.php>View Patients</a></p>";
				echo "<p align='center'><a href = providers.php>View Doctors</a></p>";
				echo "<p align='center'><a href = createappts.php>Create Appointments</a></p>";
			}
			
		}
		
	
		
	}
	
}

?>

<?php

echo $output;
//echo $search;


?>
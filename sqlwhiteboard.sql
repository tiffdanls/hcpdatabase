INSERT INTO `patients` (Symptoms, Clear) VALUES ('Headaches', 'Yes') WHERE PatientID = 1;

INSERT INTO `patients` VALUES (NULL,'Bobby', 'Brown', '2010-07-14', 3, NULL, NULL);


update patients set Symptoms = 'Headaches', Clear = 'Y' where PatientID = 1;
update patients set Symptoms = 'Stomach Pain' where PatientID = 1;

select * from schedule where doctorid = 1; 

	$providers = $mysqli->query(
	"SELECT doctors.DoctorID, doctors.doctorname,schedule.date,schedule.time
  	FROM schedule
    INNER JOIN doctors
    ON doctors.DoctorID=schedule.DoctorID
    WHERE doctors.doctorname LIKE '%$search%'");
	
$providers = $mysqli->query(
	"SELECT doctors.DoctorID, doctors.doctorname,schedule.date,schedule.time, patients.PatientID, patients.FirstName, patients.LastName, patients.Symptoms, patients.Clear
  	FROM schedule	
    INNER JOIN doctors
    ON doctors.DoctorID=schedule.DoctorID
	INNER JOIN patients
	ON patients.DoctorID=doctors.DoctorID
    WHERE doctors.doctorid = 1;");
	
	
	$providers = $mysqli->query(
	"SELECT doctors.DoctorID, doctors.doctorname,schedule.date,schedule.time, patients.PatientID, patients.FirstName, patients.LastName, patients.Symptoms, patients.Clear
  	FROM schedule	
    INNER JOIN doctors
    ON doctors.DoctorID=schedule.DoctorID
	INNER JOIN patients
	ON patients.DoctorID=doctors.DoctorID
	INNER JOIN patients AS patients2
	ON schedule.PatientID=patients2.PatientID
    WHERE schedule.doctorid = 1;");
	
	
create table if not exists users (
	`userid` int NOT NULL auto_increment, 
	`username` varchar (255),
	`password` varchar (255),
	`description` varchar (255),
	`position` int(10),
	primary key (`userid`)
	);
	
	
	insert into users values (null, 'receptionist', 'password', 'receptionist', 0);
	insert into users values (null, 'lopez', 'lopez1', 'Dr. Lopez', 1);
	insert into users values (null, 'miles', 'miles1', 'Dr. Miles', 1);	
	insert into users values (null, 'rivera', 'rivera1', 'Dr. Rivera', 1);
	insert into users values (null, 'cooper', 'cooper1', 'Dr. Cooper', 1);
	
	
	select position from users where username = 'miles' and password = 'miles1'; 


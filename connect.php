<?php
    $meetingId = $_POST['meetingId'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$employeeId = $_POST['employeeId'];
	$phoneNumber = $_POST['phoneNumber'];

	// Database connection
	$conn = new mysqli('localhost','root','','forms database');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(meetingId, firstName, lastName, email, employeeId, phoneNumber) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $meetingId, $firstName, $lastName, $email, $employeeId, $phoneNumber);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
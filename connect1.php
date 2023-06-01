<?php
	$firstname = $_POST['firstname'];
	// $lastName = $_POST['lastName'];
	// $gender = $_POST['gender'];
	// $email = $_POST['email'];
	// $password = $_POST['password'];
	$number = $_POST['number'];
	$email = $_POST['email'];
	$date = $_POST['date'];

	// Database connection
	$conn = new mysqli('localhost','root','','hospital');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into login(firstname, number, email, date) values(?, ?, ?, ?)");
		$stmt->bind_param("sisi", $firstname, $number, $email, $date);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
<?php
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$prblm = $_POST['prblm'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$relation = $_POST['relation'];
	$phone = $_POST['phone'];
	$gender =$_POST['gender'];

	// Database connection
	$conn = new mysqli('localhost','root','', 'contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into patient_name(firstname, email, prblm, age, address, relation, phone, gender) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssissis", $firstname, $email, $prblm, $age, $address, $relation, $phone, $gender);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
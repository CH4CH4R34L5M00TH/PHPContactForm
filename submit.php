<?php
	// Check if the form was submitted
	if(isset($_POST['submit'])) {

		// Get the form data
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		// Validate the data
		if(empty($name) || empty($email) || empty($subject) || empty($message)) {
			echo "Please fill in all fields.";
			exit();
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Please enter a valid email address.";
			exit();
		}
		else {
			// Send the email
			$to = "mihukat@gmail.com";
			$headers = "From: " . $name . " <" . $email . ">\r\n";
			$message = "Subject: " . $subject . "\n\n" . $message;
			mail($to, $subject, $message, $headers);

			// Show a confirmation message
			echo "Thank you for your message!";
		}
	}
?>

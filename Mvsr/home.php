<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guarder_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to handle form submission
function submitGrievance($conn, $name, $email, $phoneNumber, $grievance) {
    $sql = "INSERT INTO grievances (name, email, phoneNumber, grievance) VALUES ('$name', '$email', '$phoneNumber', '$grievance')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $grievance = $_POST["grievance"];

    // Call the function to submit the grievance
    if (submitGrievance($conn, $name, $email, $phoneNumber, $grievance)) {
        echo json_encode(["status" => "success", "message" => "Grievance submitted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error submitting grievance"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}

// Close the database connection
$conn->close();
?>


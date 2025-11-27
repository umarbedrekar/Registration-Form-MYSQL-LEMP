<?php
$servername = "localhost";
$username = "root";  // your DB user
$password = "root";  // your DB password
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("<h2 style='color:red;text-align:center;'>Connection failed: " . $conn->connect_error . "</h2>");
}

// Sanitize inputs
$user = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insert into DB
$sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";
if ($conn->query($sql) === TRUE) {
    echo "<div style='
            background:#f0f9f4;
            padding:20px;
            margin:50px auto;
            width:400px;
            border-radius:10px;
            text-align:center;
            font-family:Arial,sans-serif;
            box-shadow:0 5px 15px rgba(0,0,0,0.2);
        '>
        <h2 style='color:green;'>🎉 Registration Successful!</h2>
        <p>Welcome, <b>$user</b>! Your account has been created.</p>
        <a href='index.html' style='
            display:inline-block;
            margin-top:15px;
            padding:10px 20px;
            background:linear-gradient(to right,#667eea,#764ba2);
            color:white;
            text-decoration:none;
            border-radius:8px;'>Go Back</a>
        </div>";
} else {
    echo "<h2 style='color:red;text-align:center;'>Error: " . $conn->error . "</h2>";
}

$conn->close();
?>

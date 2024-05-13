<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hww";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$checkEmailQuery = "SELECT email FROM user_reg";
$result = $conn->query($checkEmailQuery);

$emails = [];
while ($row = $result->fetch_assoc()) {
    $emails[] = $row['email'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="...">
    <title>Emails List</title>
</head>
<body>
    <div class="container mt-5">
        <h2>List of Emails</h2>
        <ul>
            <?php
            foreach ($emails as $email) {
                echo "<li>$email</li>";
            }
            ?>
        </ul>

        <h2>Add New Email</h2>
        <form onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="email" class="form-label">New Email address</label>
                <input type="email" class="form-control" id="email" name="email" required oninput="checkEmail()">
                <div class="form-text" id="emailMessage"></div>
            </div>
            <button type="submit" class="btn btn-primary" id="submitBtn">Add Email</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="..."></script>
    <script>
        function checkEmail() {
            var email = document.getElementById('email').value;
            var emailMessage = document.getElementById('emailMessage');
            var submitBtn = document.getElementById('submitBtn');

            var emailExists = <?php echo json_encode($emails); ?>.includes(email);

            if (emailExists) {
                emailMessage.innerText = 'Email is already registered';
                submitBtn.disabled = true;
            } else {
                emailMessage.innerText = '';
                submitBtn.disabled = false;
            }
        }

        function validateForm() {
            return true;
        }
    </script>
</body>
</html>

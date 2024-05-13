<?php
require_once('db.php');
require_once('user.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User($conn);
    $loggedIn = $user->login($email, $password);

    if ($loggedIn) {
        header('Location: dahboard.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


    <style>
       body {
            background-image: url("img2.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        .card {
            max-width: 400px;
        }

        .error-message {
            color: gr;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }

        .bg-transparent {
            background: transparent !important;
        }
      
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto bg-transparent shadow-lg">
            <div class="card-header text-white">
                <h2 class="text-center">User Login</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Enter user email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <span class=" input-group">
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Enter password">
                        <span class="input-group-text"><i class="bi bi-eye-slash" id="togglePassword"></i></span></span>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$loggedIn) {
                echo '<h5 class="error-message">Invalid email or password!!!!</h5>';
            }
            ?>

            <div class="text-center mb-2">
                <a href="register.php" class="btn btn-warning">Go to Register</a>
            </div>
        </div>
    </div>
     <script>
        const togglePassword = document
            .querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', () => {
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye and bi-eye icon
            this.classList.toggle('bi-eye');
        });
    </script>
</body>
</html>

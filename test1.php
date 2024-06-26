<!DOCTYPE html>
<html lang="en">
<head>
    <title>Toggle Password Visibility</title>
    <link rel="stylesheet"
        href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity=
"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <style>
        form i {
            margin-left: -30px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign In</h1>
        <form>
            <p>
                <label>Username:</label>
                <input type="text" name="userID" id="userID">
            </p>
            <p>
                <label>Password:</label>
                <input type="password" name="password" id="password" />
                <i class="bi bi-eye-slash" id="togglePassword"></i>
            </p>
            <button type="submit" id="submit" class="btn btn-primary">
                Log In
            </button>
        </form>
    </div>
    <script>
        const togglePassword = document
            .querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', () => {
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('bi-eye');
        });
    </script>
</body>
</html>

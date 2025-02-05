<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $_SESSION['loggedin'] = true; // Set the session variable
    exit; // Exit to prevent further output
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="dashboard.php" method="post">
                <div class="input-group">
                  <span class="input-group-addon">
                  </span>
                  <input type="text" placeholder="username">
                </div><br>
                <div class="input-group">
                  <span class="input-group-addon">
                </span>
                <input type="password" placeholder="password">
                </div><br>
                <button type="submit" class="login-btn">Masuk</button>
            </form>
        </div>
    </div>
    <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Simple authentication check (replace with your own logic)
        if (username === 'username' && password === 'password') {
            // Set session variable for logged in user
            fetch('login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'login=true'
            }).then(() => {
                window.location.href = 'dashboard.php'; // Change this to your dashboard URL
            });
        } else {
            alert('Invalid username or password!');
        }
    });
</script>
</body>
</html>
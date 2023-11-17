<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login and Register</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.container {
    display: flex;
    justify-content: space-around;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
}

input {
    padding: 8px;
    margin-bottom: 16px;
}

button {
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Tampilan</h2>
            <form action="login.php" method="post">
                <label for="login-username">Username:</label>
                <input type="text" id="login-username" name="username" required>
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="form-container">
            <h2>Register</h2>
            <form action="register.php" method="post">
                <label for="register-username">Nama:</label>
                <input type="text" id="register-username" name="username" required>
                <label for="register-password">Tanggal Lahir:</label>
                <input type="text" id="register-password" name="password" required>
                <label for="register-username">Alamat:</label>
                <input type="text" id="register-username" name="alamat" required>
                <label for="register-password">Email:</label>
                <input type="text" id="register-password" name="email" required>
                <label for="register-username">Prodi:</label>
                <input type="text" id="register-username" name="prodi" required>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
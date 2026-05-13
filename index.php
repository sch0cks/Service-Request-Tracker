<!DOCTYPE html>
<html>
<head>
    <title>Service Tracker Login</title>

    <style>
        body {
            font-family: Arial;
            background: #111111;
        }

        .login-box {
            width: 300px;
            margin: 100px auto;
            background: #1f1f1f;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #505050;
        }

        input {
            width: 92%;
            padding: 10px;
            margin-top: 10px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: royalblue;
            color: white;
            border: none;
        }

        h2 {
            color: white;
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>Login</h2>

    <form action="./auth/login.php" method="POST">

        <input type="email" name="email" placeholder="Enter Email" required>

        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit">Login</button>

    </form>
</div>

</body>
</html>
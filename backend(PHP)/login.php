<?php
session_start();
include("db.php");

global $conn;

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            header("Location: plant.php");
            exit();
        } else {
            $error = "Wrong password";
        }
    } else {
        $error = "User not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #0f1a12, #0b1410);
}

/* Card */
.login-card {
    width: 100%;
    max-width: 420px;
    padding: 40px 30px;
    border-radius: 18px;

    background: #121f16;
    border: 1px solid rgba(76, 175, 80, 0.25);
    box-shadow: 0 20px 60px rgba(0,0,0,0.6);
}
.login-card h5{
    color: #90d9a0;
}
.login-card p{
    color: #cfe8d2;
}
/* Title */
.brand {
    text-align: center;
    font-size: 30px;
    font-weight: 800;
    color: #7dff9a;   /* lighter neon green */
    letter-spacing: 2px;
    margin-bottom: 5px;
}

/* Subtitle */
.subtitle {
    text-align: center;
    color: #cfe8d2;   /* lighter text */
    font-size: 14px;
    margin-bottom: 25px;
}

/* Inputs */
.form-control {
    border-radius: 10px;
    padding: 12px;
    background: #0e1a12;
    border: 1px solid #2e7d32;
    color: #eafbea;   /* lighter input text */
    transition: 0.2s;
}

.form-control::placeholder {
    color: #9fb9a6;
}

.form-control:focus {
    border-color: #7dff9a;
    box-shadow: 0 0 0 0.2rem rgba(125,255,154,0.2);
    background: #0e1a12;
    color: #ffffff;
}

/* Button */
.btn-custom {
    background: #2e7d32;
    color: #ffffff;
    padding: 12px;
    border-radius: 10px;
    font-weight: 600;
    border: none;
    transition: 0.3s;
}

.btn-custom:hover {
    background: #43a047;
}

/* Links */
a  {
    color: #9fffb3;
    text-decoration: dotted;
}

a:hover {
    text-decoration: underline;
}

/* Error */
.alert {
    border-radius: 10px;
    font-size: 14px;
    text-align: center;
    background: rgba(183, 28, 28, 0.15);
    color: #ffb3b3;
    border: 1px solid rgba(255, 100, 100, 0.4);
}


</style>
</head>
<body>

<div class="login-card">

   <div class="brand">LEAFORA</div>
    <div class="subtitle">Login to manage your plants & cart</div>

    <h5 class="text-center mb-3">Welcome Back</h5>
    <?php
    
if(isset($error)){
    echo "<div id='errorBox' class='alert alert-danger'>$error</div>";
}
?>


    <form method="POST">
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>

        <button type="submit" class="btn btn-custom w-100">Login</button>
    </form>

    <p class="text-center mt-3">
        Don’t have an account? <a href="register.php">Register</a>
    </p>

</div>
<script>
setTimeout(() => {
    let box = document.getElementById("errorBox");
    if(box){
        box.style.transition = "0.5s";
        box.style.opacity = "0";
        setTimeout(() => box.remove(), 500);
    }
}, 2000);



</script>
</body>
</html>
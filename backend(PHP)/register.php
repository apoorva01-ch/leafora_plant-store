<?php 
include("db.php");
session_start();

global $conn;
if (
    isset($_POST['name']) && isset($_POST['email']) &&
    isset($_POST['password'])
) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // check if user already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "User already exists";
        exit();
    }
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error registering user";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register - Leafora</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #07130d, #0c1f16, #0a1a12);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #dfeee6;
        }

        /* main container (fix alignment properly) */
        .container-box {
            width: 100%;
            max-width: 420px;
            padding: 25px;
        }

        /* card */
        .card-box {
            padding: 35px;
            border-radius: 14px;
            background: rgba(18, 35, 26, 0.85);
            border: 1px solid rgba(120, 200, 160, 0.15);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        /* title centered properly */
        .title {
            text-align: center;
            font-size: 26px;
            font-weight: 600;
            color: #c8f7dc;
            margin-bottom: 25px;
        }

        /* inputs */
        .form-control {
            background: #0b1a13 !important;
            border: 1px solid #2a4a3a !important;
            color: #e6f4ea !important;
            padding: 10px;
        }

        .form-control::placeholder {
            color: #8aa89a;
        }

        /* button */
        .btn-custom {
            background: #1f9d63;
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px;
        }

        .btn-custom:hover {
            background: #178451;
        }

        /* bottom text */
        .bottom-text {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .bottom-text a {
            color: #7fffd4;
            text-decoration: none;
        }

        .bottom-text a:hover {
            text-decoration: underline;
        }

        * { box-sizing: border-box; }

body {
  min-height: 100vh;  /* height ki jagah min-height */
  padding: 20px;      /* mobile par chipkne se bachao */
}

.form-control {
  font-size: 16px !important; /* iPhone zoom fix */
  padding: 12px !important;
}

.btn-custom {
  font-size: 16px !important;
  padding: 12px !important;
}

@media (max-width: 480px) {
  .container-box {
    padding: 10px;
  }

  .card-box {
    padding: 25px 18px;
    border-radius: 12px;
  }

  .title {
    font-size: 20px;
    margin-bottom: 18px;
  }
}
    </style>

</head>

<body>

    <div class="container-box">
        <div class="card-box">

            <div class="title">🌿 Create Leafora Account</div>

            <form method="POST" action="register.php">

                <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>

                <input type="email" name="email" class="form-control mb-3" placeholder="Email Address" required>

                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                <button class="btn btn-custom w-100">Register</button>

            </form>

            <div class="bottom-text">
                Already have an account? <a href="login.php">Login</a>
            </div>

        </div>
    </div>

</body>

</html>
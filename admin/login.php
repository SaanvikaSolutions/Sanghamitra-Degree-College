<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body, html {
            height: 100%;
            background-color: #efefef;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .login-bg {
            background: url('../images/login/img3.jpeg') no-repeat center;
            background-size: cover;
            height: 100%;
        }
        .card {
            width: 80%;
            width: 800px; /* Set a maximum width for larger screens */
            height: 80%; /* Adjust the height of the card */
        }
        .card>.row{
            width:800px;
            height: 500px;
        }
        .card-body {
            height: 100%; /* Make the card body fill the card height */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        /* Adjust the height of form elements */
        .form-group {
            margin-bottom: 15px;
        }
        .card>.row{
            width:800px;
            height:500px;
        }
        /* Media query for smaller screens */
        @media (max-width: 600px) {
            .card {
                width: 100%;
                height: auto;
                margin: 0px auto;
            }
            .card .row {
                width: 100%;
                height: auto;
            }
            .login-bg {
                display: none; /* Hide the image on smaller screens */
            }
            .col-md-6 {
                padding: 20px;
            }
        }
        /* Media query for smaller screens */
@media (max-width: 1019px) {
    .card {
        width: 100%;
        height: auto;
        margin: 0px auto; /* Center the card horizontally */
    }
    .card .row {
        width: 100%;
        height: auto;
    }
    .col-md-6 {
        padding: 0px;
    }
}

        
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-8">
                <div class="card">
                    <div class="row no-gutters">
                        <!-- Left Side - Photo Card -->
                        <div class="col-md-6">
                            <div class="login-bg">

                            </div>
                        </div>
                        <!-- Right Side - Login Card -->
                        <div class="col-md-6">
                            <div class="card-body">
                                <h2 class="card-title text-center mb-4">LOGIN PAGE</h2>
                                <?php if(isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_GET['error']; ?>
                                </div>
                                <?php } ?>
                                <form action="login_logic.php" method="POST">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" autocomplete="off">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">Show</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript to toggle password visibility -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? 'Show' : 'Hide';
        });
    </script>
</body>
</html>
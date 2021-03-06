<?php

    include('session.php');

    if(isset($_SESSION['session'])){
        header("Location: dashboard.php");
		
    } 
else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>On Target Inventory System</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    
      <script language="javascript" src="../../src/howler.core.js"></script>
<script>
    var sound = new Howl({
      urls: ['running_out.webm', 'running_out.mp3']
    });
    
    play();
</script>
</head>

<style>
    body {
        background: #bdc3c7;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to top, #2c3e50, #bdc3c7);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to top, #2c3e50, #bdc3c7);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    .tngh {
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 50px;
        width: 230px;
        height: 230px;
    }

    .tngh1 {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 30%;
        color: azure;
    }

</style>

<body class="bg-dark">
    <div class="container">
        <img class="tngh" src="Logo On Target.png" alt="Smiley face">
        <h1 class="tngh1">Inventory System</h1>
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input class="form-control" name="email" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter email" required>  
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" name="password" id="password" type="password" placeholder="Password" required>
                    </div>
                    <!--<div class="form-group">
                        <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Remember Password</label>
                        </div>
                    </div> -->
            
                        <button class="btn btn-outline-secondary btn-block" name="submit" id="submit" >Login</button>
                    
                    
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="register.html">Register an Account</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    
</body>

</html>

<?php

    }
	?>
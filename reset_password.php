<!DOCTYPE html>
<html>

<head>


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="DexignLab">
        <meta name="robots" content="">
        <meta name="keywords" content="admin dashboard, admin template, analytics, bootstrap, bootstrap 5, bootstrap 5 admin template, job board admin, job portal admin, modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app, frontend">
        <meta name="description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
        <meta property="og:title" content="Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd">
        <meta property="og:description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
        <meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png">
        <meta name="format-detection" content="telephone=no">

        <!-- Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- PAGE TITLE HERE -->
        <title>Haqabtire Bank</title>

        <!-- Favicon icon -->
        <link rel="shortcut icon" type="image/png" href="images/higher.png">
        <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

    </head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="#"><img src="images/high.png" alt="" width="150" height="150"></a>


                                        <body>
                                            <h1>Reset Password</h1>
                                            <?php if (isset($_GET['email'])) : ?>
                                                <label>A CODE HAS BEEN SENT TO <b><?php echo $_GET['email']; ?></b> ENTER BELOW CODE 👇</label>
                                            <?php endif; ?>
                                            <?php if (isset($_GET['error'])) : ?>
                                                <div style="color: red;"><?php echo $_GET['error']; ?></div>
                                            <?php endif; ?>
                                            <form method="post" action="update_password.php">
                                                <div class="form-group">
                                                    <label for="reset_code"><strong>Reset Code:</strong></label> <br>
                                                    <input type="text" id="reset_code" class="form-control" name="reset_code" required>
                                                    <br><br>
                                                </div>
                                                <label for="new_password"><strong>New Password:</strong>:</label>
                                                <input type="password" id="new_password" class="form-control" name="new_password" required>
                                                <br><br>
                                                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>

</body>

</html>
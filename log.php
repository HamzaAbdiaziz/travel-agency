<?php session_start();
include 'config/SYD_Class.php';

$coder = new sydClass();
if (isset($_POST["btnLogin"])) {
    $user = $_POST['email-username'];
    $pass = $_POST['password'];
    $qry = "select * FROM users where user_name='$user' and password='$pass' ";
    // $qry = "SELECT ub.u_b_id,u.user_name,u.user_password FROM user_branch ub , users u  WHERE u.user_id=ub.user_id and u.user_name='$user' and u.user_password='$pass' ";
    echo $qry;
    $coder->search($qry);
    if ($coder->result->num_rows == 1) {
        while ($row = $coder->result->fetch_array(MYSQLI_NUM)) {
            $_SESSION['user_type'] = $row[3];
            $_SESSION['username'] = $row[1];
            $_SESSION['user'] = $row[0];
            echo $row[0];
        }
        $index_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
        header('Location: index.php');
    } else {
        // $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
        // header('Location: '. $url);

        header("Location:login2.php?message=Your Username or password iswrong");
    }
}

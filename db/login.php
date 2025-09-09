    <?php
    session_start();
    require 'connection.php';

    $email = $_POST["email"];
    $password = $_POST["password"];

    if(
        $email == "" ||
        $password == "" 
    ) {
        $_SESSION ["VALIDATION_INPUT"] = "All fields must be filled";
        header("Location: http://localhost/kurikulum/login.php");
        return;
    } 

    //CEK EMAIL
    $cekUser = "SELECT * FROM users WHERE email='$email'";
    $user = mysqli_query($connection, $cekUser);

    if ($connection->query($cekUser)->num_rows == 0) {
        $_SESSION['VALIDATION_EMAIL_EXIST'] = "Email has been NOT registered";
        header("Location: http://localhost/kurikulum/login.php");
        return;
    }

    //CEK PASSWORD
    $auth = $user->fetch_assoc();
    if(password_verify($password, $auth['password'])) {
        $_SESSION['LOGIN_SUCCESS'] = "Login Success";
        $_SESSION['is_login'] = true;
        header("Location: http://localhost/kurikulum/index.php");
        die();
    }

        $_SESSION['WRONG_PASSWORD'] = "Wrong Password";
        header("Location: http://localhost/kurikulum/login.php");
        return;
    print_r($auth);
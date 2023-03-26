<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    include('../classes/dbh.class.php');
    include('../classes/signup.class.php');
    include('../classes/signupcontr.class.php');

    $signup = new SignUpContr($id, $email, $pwd, $pwdrepeat);
    $signup->signUpUser();
}

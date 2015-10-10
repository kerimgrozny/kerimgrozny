<?php
    // hashing password
    $password = "secret";
    $hashed_password = password_hash($password, PASSWORD_DEFAULT,
        'cost' => '14');

    echo $hashed_password . "<br/>";

?>
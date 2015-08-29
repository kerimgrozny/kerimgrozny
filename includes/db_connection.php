<?php
define('HOSTNAME', 'localhost');
define('USERNAME', 'kerim');
define('PASSWORD', '884891km_');
define('DATABASE', 'kerimgrozny');

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
mysqli_set_charset($connection,'UTF8');

if(!$connection){
    die ("Database connection failed: " . mysqli_connect_error($connection));
}

?>
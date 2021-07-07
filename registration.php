<?php

session_start();

$con = mysqli_connect('localhost','usernameofdatabase','password');// usernameofdatabase: Enter your user name
                                                                   /* passsword: Enter your user password */

mysqli_select_db($con, 'userregistration');  // create on data base : 
                           /* create a data base : userregistration */

?>
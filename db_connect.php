<?php
    $host = "localhost";
     $user1="bank_admin";
     $pass1="@Creative123";
     $dbname = "bank_db";
      $cxn = mysqli_connect($host,$user1,$pass1,$dbname)
                   or die ("couldnt connect to server");
?>
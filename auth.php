<<<<<<< HEAD
<?php

session_start();
if(!(isset($_SESSION['user']) && $_SESSION['user'] != '')){
    header ("Location: ../login.php");
}

=======
<?php

session_start();
if(!(isset($_SESSION['user']) && $_SESSION['user'] != '')){
    header ("Location: ../login.php");
}
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae

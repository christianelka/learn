<?php
    if (isset($_GET['hal'])) {

        if ($_GET['hal']=='pengguna') {
          include "style/style_tabel.php";
        }
        elseif ($_GET['hal']=='tambah_pengguna') {
          include "style/style2.php";
        }
        elseif ($_GET['hal']=='edit_pengguna') {
          include "style/style2.php";
        }
        else
        {
          include "style/style1.php";
        }
    }else{
    include "style/style1.php";
    }
?>
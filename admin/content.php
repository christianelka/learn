<?php
    if (isset($_GET['hal'])) {

        if ($_GET['hal'] == 'pengguna') {
          include "pengguna/pengguna.php";
        }
        elseif ($_GET['hal'] == 'tambah_pengguna') {
          include "pengguna/tambah_pengguna.php";
        }
        elseif ($_GET['hal'] == 'edit_pengguna') {
          include "pengguna/edit_pengguna.php";
        }

        elseif ($_GET['hal'] == 'hasil') {
          include "hasil/hasil.php";
        }
        elseif ($_GET['hal'] == 'cari') {
          include "hasil/hasil.php";
        }
        elseif ($_GET['hal'] == 'tambah_hasil') {
          include "hasil/tambah_hasil";
        }
        elseif ($_GET['hal'] == 'edit_hasil') {
          include "hasil/edit_hasil";
        }
        elseif ($_GET['hal'] == 'cek_hasil') {
          include "hasil/cek_hasil.php";
        }
        elseif ($_GET['hal'] == 'cetak_hasil') {
          include "hasil/cetak_hasil.php";
        }

        else
        {
          include "home.php";
        }
    }else{
    include "home.php";
    }
?>
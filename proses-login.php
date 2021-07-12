<?php

include("config.php");
$email = $_POST['email'];
$password = $_POST['password'];


// cek apakah tombol submit sudah diklik atau blum?
if (isset($_POST['Submit'])) {

    //ceklogin
    $query = "SELECT * FROM user WHERE email='$email' and password='$password'";
    $queryDB = mysqli_query($db, $query);
    $check = mysqli_num_rows($queryDB);

    if ($check > 0) {
        // echo "anda berhasil login.";
        // ambil data users
        $getData = mysqli_fetch_array($queryDB);
        // set session 
        $_SESSION['name'] = $getData;
        $_SESSION['is_login']  = true;
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-siswa.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal login...");
        echo 'username/password yang anda masukkan salah. Silahkan ulang kembali';
    }
}

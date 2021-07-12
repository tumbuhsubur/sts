<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
	$is_active = $_POST['is_active'];
	$date_created = $_POST['date_created'];

    // buat query
    $sql = "INSERT INTO user (name, email, image, password, role_id, is_active, date_created) VALUE ('$name', '$email', '$image', '$password', '$role_id', '$is_active', '$date_created')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: list-siswa.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: list-siswa.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>
<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['simpan'])) {

    // ambil data dari formulir
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
    $date_created = $_POST['date_created'];

    // buat query update
    $sql = "UPDATE user SET name='$name', email='$email', image='$image', password='$password', role_id='$role_id', date_created='$date_created' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-siswa.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}

<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['bayar'])) {

    // ambil data dari formulir
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nominal = $_POST['nominal'] + $_POST['topup'];

    // buat query update
    $sql = "UPDATE user SET name='$name', email='$email', nominal='$nominal' WHERE id=$id";
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

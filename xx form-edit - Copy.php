<?php

include("config.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM user WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Formulir Edit Siswa STS</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Siswa Sanggar Tari Sangkuriang</h3>
    </header>

    <form action="proses-edit.php" method="POST">

        <fieldset>

            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

            <p>
                <label for="name">Nama: </label>
                <input type="text" name="name" placeholder="nama lengkap" value="<?php echo $siswa['name'] ?>" />
            </p>
            <p>
                <label for="email">Email: </label>
                <textarea name="email"><?php echo $siswa['email'] ?></textarea>
            </p>
            <p>
                <label for="image">Foto: </label>
                <textarea name="image"><?php echo $siswa['image'] ?></textarea>
            </p>
            <p>
                <label for="password">Password: </label>
                <textarea name="password"><?php echo $siswa['password'] ?></textarea>
            </p>
            <p>
                <label for="role_id">Role: </label>
                <textarea name="role_id"><?php echo $siswa['role_id'] ?></textarea>
            </p>
            <p>
                <label for="nominal">Nominal: </label>
                <textarea name="nominal"><?php echo $siswa['nominal'] ?></textarea>
            </p>
            <p>
                <label for="date_created">Tanggal: </label>
                <textarea name="date_created"><?php echo $siswa['date_created'] ?></textarea>
            </p>
            <p>
                <input type="submit" value="Simpan" name="simpan" />
            </p>

        </fieldset>


    </form>

</body>

</html>
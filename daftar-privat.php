<?php

include("config.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM user, privat, db_kursus_privat WHERE user.id=$id";
$dbtari = "SELECT * FROM db_kursus_privat";
$query = mysqli_query($db, $sql);
$queryt = mysqli_query($db, $dbtari);
$siswa = mysqli_fetch_assoc($query);
$tarian = mysqli_fetch_assoc($queryt);

// cek saldo siswa
if ($siswa['nominal'] < 400000) {
    echo "Saldo kurang, nominal saldo yang sekarang tersedia :  " . ($siswa['nominal']) . "<br>";
    echo "<a href='list-siswa.php'>Kembali ke daftar siswa</a>";
    die;
}

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Halaman Admin</title>
    <meta name="description" content="Sanggar Tari Sangkuriang">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Brands.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Projects-Clean.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">

    <nav class="navbar navbar-light navbar-expand bg-white text-center shadow d-inline-flex justify-content-xl-center align-items-xl-center mb-4 topbar static-top" style="width: 1280px;height: 100px;background: var(--blue);">
        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button><img class="img-fluid" src="assets/img/logo%20sts%20transparan.png" style="height: 80px;" href="">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="width: 600;">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="form-daftar.php">[+] Tambah Baru </a></li>
                    <li class="nav-item"><a href="list-siswa.php"> | Listing Semua Siswa </a></li>
                    <li class="nav-item"><a href="list-privat.php"> | Listing Kelas Privat </a></li>
                    <li class="nav-item"><a href="list-kelompok.php"> | Listing Kelas Kelompok </a></li>
                    <li class="nav-item"><a href="list-instruktur.php"> | Listing Instruktur </a></li>
                </ul><span class="navbar-text actions"> </span>
            </nav>
        </div>
        <div>
            <a class="btn btn-primary active btn-block text-white btn-user" role="button" style="width: 100px;margin-left: 10px;margin-right: 10px;" href="beranda.html">Logout</a>
        </div>
    </nav>
</head>

<body class="text-center">
    <header>
        <h3>Formulir Pendaftaran Kelas Private Sanggar Tari Sangkuriang</h3>
    </header>

    <form action="proses-privat.php" method="POST">

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
                <label for="nominal">Nominal: </label>
                <textarea name="nominal"><?php echo $siswa['nominal'] ?></textarea><br>
                <label for="tarif-private"> Tarif Private: <?php echo $siswa['tarif-private'] ?></label><br>
                <label for="nominal-akhir"> Sisa Nominal: </label>
                <textarea name="sisa-nominal"><?php echo $siswa['nominal'] - $siswa['tarif-private'] ?></textarea>
            </p>
            <p>
            <form action="proses_privat.php">
                <label for="name_kursus">Nama Kursus: </label>
                <select name="name_kursus" id="<?php echo $i ?>">
                    <?php
                    // $dt = "SELECT * FROM `db_kursus_privat`";
                    // $querydt = mysqli_query($db, $dt);
                    // while ($dtt = mysqli_fetch_array($querydt)) {
                    $tarian['id'] = 1;
                    while ($tarian = mysqli_fetch_assoc($query)) {
                        echo "<option value=" . $i . ">" . $tarian['name_kursus'] . "</option>";
                        $i++;
                    }
                    ?>
                </select>
            </form>
            <!-- <input type="submit" value="tarian" name="tarian" /> -->
            </p>
            <p>
                <label for="date_created">Tanggal: </label>
                <textarea name="date_created"><?php echo $siswa['date_daftar'] ?></textarea>

            </p>
            <p>
                <input type="submit" value="Simpan" name="simpan" />
            </p>
        </fieldset>
    </form>

</body>

</html>
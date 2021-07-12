<?php include("config.php"); ?>

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
        <h3>Listing Siswa Kelompok per Instruktur</h3>
    </header>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>email</th>
                <th>image</th>
                <th>Role</th>
                <th>Nominal</th>
                <th>Nama Kursus</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // $instruktur = 3;
            $sql = "SELECT * FROM `user` WHERE role_id = 3";
            $query = mysqli_query($db, $sql);

            while ($siswa = mysqli_fetch_array($query)) {
                echo "<tr>";

                echo "<td>" . $siswa['id'] . "</td>";
                echo "<td>" . $siswa['name'] . "</td>";
                echo "<td>" . $siswa['email'] . "</td>";
                echo "<td>" . $siswa['image'] . "</td>";
                echo "<td>" . $siswa['role_id'] . "</td>";
                echo "<td>" . $siswa['nominal'] . "</td>";
                echo "<td>" . $siswa['date_created'] . "</td>";

                echo "<td>";
                echo "<a href='form-edit.php?id=" . $siswa['id'] . "'>Edit</a> | ";
                echo "<a href='gaji-privat.php?id=" . $siswa['id'] . "'>Gaji Privat</a> | ";
                echo "<a href='gaji-kelompok.php?id=" . $siswa['id'] . "'>Gaji Kelompok | </a>";
                echo "<a href='gaji-total.php?id=" . $siswa['id'] . "'>Cetak Gaji Total</a>";
                echo "</td>";

                echo "</tr>";
            }
            ?>

        </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

</body>

</html>
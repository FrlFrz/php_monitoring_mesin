<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monitoring Suhu dan Kelembaban</title>

    <!-- Tambahkan AdminLTE CSS -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <style>
        .row-with-margin {
            margin-top: 20px; /* Sesuaikan dengan tinggi margin yang Anda inginkan */
        }
    </style>
</head>

<body class="hold-transition">
    <!-- Tidak ada sidebar -->

    <!-- Konten utama -->
    <section class="content">

        <?php
        include "koneksi.php";

        // Query untuk mengambil 5 data terakhir
        $query = mysqli_query($koneksi, "SELECT * FROM tbmonitor ORDER BY id DESC LIMIT 5");
        ?>

<div class="row row row-with-margin">
    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-info">
            <div class="inner">
                <?php
                // Mengambil data suhu dari data terbaru
                $data = mysqli_fetch_array($query);
                $suhu = $data['suhu'];
                ?>
                <h3>
                    <?php echo $suhu; ?><sup style="font-size: 20px">°C</sup>
                </h3>
                <p>SUHU</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <!-- Tambahkan tombol "More info" dengan atribut data-toggle dan data-target -->
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-success">
            <div class="inner">
                <?php
                // Mengambil data kelembaban dari data terbaru
                $kelembaban = $data['kelembaban'];
                ?>
                <h3>
                    <?php echo $kelembaban; ?><sup style="font-size: 20px">%</sup>
                </h3>
                <p>KELEMBABAN</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <!-- Tambahkan tombol "More info" dengan atribut data-toggle dan data-target -->
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <!-- Tambahkan dua kotak lainnya di sini -->
        <!-- Contoh kotak ketiga -->
        <div class="small-box bg-warning">
            <div class="inner">
                <!-- Isi dengan data sesuai -->
                <h3>50</h3>
                <p>KOTAK KETIGA</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <!-- Tambahkan tombol "More info" dengan atribut data-toggle dan data-target -->
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <!-- Contoh kotak keempat -->
        <div class="small-box bg-danger">
            <div class="inner">
                <!-- Isi dengan data sesuai -->
                <h3>60</h3>
                <p>KOTAK KEEMPAT</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <!-- Tambahkan tombol "More info" dengan atribut data-toggle dan data-target -->
        </div>
    </div>
</div>


        <!-- Chart -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <canvas id="suhuChart"></canvas>
                </div>
                <div class="col-lg-6">
                    <canvas id="kelembabanChart"></canvas>
                </div>
            </div>
        </div>

        <h4> Waktu update terakhir : (<?php echo $data['waktu'] ?>) Tanggal : (<?php echo $data['tanggal'] ?>)</h4>
    </section>

    

    <!-- /.wrapper -->

    <!-- Tambahkan AdminLTE JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data dummy untuk chart (ganti dengan data yang sesuai)
        var suhuData = [];
        var kelembabanData = [];
        var labels = [];

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM tbmonitor ORDER BY id DESC LIMIT 5");
        while ($data = mysqli_fetch_array($query)) {
            echo "suhuData.push('{$data['suhu']}');";
            echo "kelembabanData.push('{$data['kelembaban']}');";
            echo "labels.push('{$data['waktu']}');";
        }
        ?>

        // Menggambar chart suhu
        var suhuChartCanvas = document.getElementById("suhuChart").getContext('2d');
        var suhuChart = new Chart(suhuChartCanvas, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: "Suhu (°C)",
                    data: suhuData,
                    fill: false,
                    borderColor: "red"
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Menggambar chart kelembaban
        var kelembabanChartCanvas = document.getElementById("kelembabanChart").getContext('2d');
        var kelembabanChart = new Chart(kelembabanChartCanvas, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: "Kelembaban (%)",
                    data: kelembabanData,
                    fill: false,
                    borderColor: "blue"
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</body>

</html>
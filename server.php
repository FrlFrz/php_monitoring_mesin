<?php
    include("koneksi.php");
?>

<table class="table">
    <thead>
        <tr>
            <th>Waktu</th>
            <th>Suhu (°C)</th>
            <th>Kelembaban (%)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT waktu, suhu, kelembaban FROM tbmonitor ORDER BY id DESC LIMIT 5";
        $result = mysqli_query($koneksi, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['waktu'] . "</td>";
                echo "<td>" . $row['suhu'] . "°C</td>";
                echo "<td>" . $row['kelembaban'] . "%</td>";
                echo "</tr>";
            }
            mysqli_free_result($result);
        } else {
            echo "Gagal mengeksekusi query: " . mysqli_error($koneksi);
        }
        ?>
    </tbody>
</table>
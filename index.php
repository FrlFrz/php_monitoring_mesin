<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Monitoring Suhu dan Kelembaban</title>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			// Inisialisasi status modal
			var modalOpen = false;

			// Fungsi untuk memuat konten dan menampilkan modal jika dibuka
			function loadContent() {
				$.ajax({
					url: 'home.php',
					type: 'GET',
					success: function(response) {
						$('#konten').html(response);

						// Jika modal belum terbuka, tambahkan event listener pada tombol "More info"
						if (!modalOpen) {
							$('#more-info-button').click(function() {
								$('#suhuModal').modal('show'); // Ubah ini menjadi $('#suhuModal').modal('show');
								modalOpen = true;
							});
						}
					},
					error: function() {
						console.error('Gagal memuat konten.');
					}
				});
			}

			// Panggil fungsi untuk memuat konten secara periodik
			loadContent();
			var refreshInterval = setInterval(loadContent, 1000);
		});
	</script>
</head>

<body>
	<center>
		<div id="konten"></div>
	</center>

	<!-- Tambahkan tombol "More info" di sini -->
	<button type="button" class="btn btn-primary" id="more-info-button">More info</button>

	<!-- Modal -->
	<!-- Modal untuk SUHU -->
	<div class="modal fade" id="suhuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Data Monitoring</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
				include "koneksi.php"; // Import koneksi ke database

				// Query untuk mengambil data suhu dan kelembaban dari tabel
				$query = "SELECT waktu, suhu, kelembaban FROM tbmonitor ORDER BY id DESC LIMIT 5";
				$result = mysqli_query($koneksi, $query);

				?>

				<!-- Pada bagian PHP untuk menampilkan data dari MySQL dalam tabel -->
				<div class="modal-body">
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
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

</body>

</html>

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
	<button type="button" class="btn btn-primary" id="more-info-button">Data lengkap</button>
	<button type="button" class="btn btn-danger text-white" onclick="window.location.href='hapus.php'">Hapus Data</button>


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
				// $query = "SELECT waktu, suhu, kelembaban FROM tbmonitor ORDER BY id DESC LIMIT 5";
				// $result = mysqli_query($koneksi, $query);

				?>

				<!-- Pada bagian PHP untuk menampilkan data dari MySQL dalam tabel -->
				<div class="modal-body">
					<div id="link_wrapper">

					</div>	

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
<script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("link_wrapper").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "server.php", true);
  xhttp.send();
}
setInterval(function() {
	loadXMLDoc();
}, 1000);

window.onLoad = loadXMLDoc;
</script>

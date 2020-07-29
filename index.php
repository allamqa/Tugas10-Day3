<?php
//memasukkan file config.php
include('config.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>CRUD Arkademy</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">CRUD Arkademy</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container" style="margin-top:20px">
		<h2>Produk</h2>

		<hr>

		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>NO.</th>
					<th>Nama Produk</th>
					<th>Keterangan</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel siswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM produk") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['nama_produk'].'</td>
							<td>'.$data['keterangan'].'</td>
							<td>'.$data['harga'].'</td>
							<td>'.$data['jumlah'].'</td>
							<td>
								<a href="edit.php?id='.$data['id_produk'].'" class="badge badge-warning">Edit</a>
								<a href="delete.php?id='.$data['id_produk'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>

	</div>


</body>

</html>
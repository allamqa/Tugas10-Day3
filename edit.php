<?php include('config.php'); ?>
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
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
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
		<h2>Edit Produk</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_produk = $_GET['id'];
			
			//query ke database SELECT tabel Siswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama_produk			= $_POST['nama_produk'];
			$keterangan	= $_POST['keterangan'];
			$harga		= $_POST['harga'];
      	$jumlah		= $_POST['jumlah'];
			
			$sql = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk', keterangan='$keterangan', harga='$harga', jumlah='$jumlah' WHERE id_produk='$id_produk'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?id='.$id_produk.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="edit.php?id=<?php echo $id_produk; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA Produk</label>
				<div class="col-sm-10">
					<input type="text" name="nama_produk" class="form-control" value="<?php echo $data['nama_produk']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-10">
					<input type="text" name="keterangan" class="form-control" value="<?php echo $data['keterangan']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Harga Produk</label>
				<div class="col-sm-10">
					<input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" required>
				</div>
			</div>
      <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Produk</label>
				<div class="col-sm-10">
					<input type="text" name="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	
</body>
</html>
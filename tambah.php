<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$no_pendaftar			= $_POST['no_pendaftar'];
			$nama_lengkap			= $_POST['nama_lengkap'];
			$tempat	= $_POST['tempat_lahir'];
			$tanggal_lahir		= $_POST['tanggal_lahir'];
			$jenis_kelamin		= $_POST['jenis_kelamin'];
			$agama				= $_POST['agama'];
			$alamat				= $_POST['alamat'];
			$no_identitas		= $_POST['no_identitas'];
			$no_telepon			= $_POST['no_telepon'];
			$email				= $_POST['email'];
			$no_whatsapp		= $_POST['whatsapp'];
			$nama_orangtua		= $_POST['nama_orangtua'];
			$lulusan			= $_POST['lulusan'];
			$prodi 				= $_POST['prodi'];

			$cek = mysqli_query($koneksi, "SELECT * FROM identitas_pendaftar WHERE no_pendaftar='$no_pendaftar'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO identitas_pendaftar(no_pendaftar, nama_lengkap, tempat_lahir, tgl_lahir, jenis_kelamin, agama, alamat, no_identitas, no_telepon, email, whatsapp, nama_ortu, lulusan, program_studi) VALUES('$no_pendaftar', '$nama_lengkap', '$tempat', '$tanggal_lahir','$jenis_kelamin','$agama','$alamat','$no_identitas','$no_telepon','$email','$no_whatsapp','$nama_orangtua','$lulusan','$prodi')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_pendaftar";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal,No Pendaftar sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_pendaftar" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No Pendatar</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="no_pendaftar" class="form-control" size="4" required placeholder="PMxxx">
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Lengkap</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_lengkap" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tempat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tempat_lahir" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tanggal_lahir" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6">
					<select name="jenis_kelamin" class="form-control" required>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Agama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="agama" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No. Identitas</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_identitas" class="form-control" required placeholder="KTP/NO KK">
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No. Telepon</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_telepon" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">email</label>
				<div class="col-md-6 col-sm-6">
					<input type="email" name="email" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No. Whatsapp</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="whatsapp" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Orang Tua</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_orangtua" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Lulusan</label>
				<div class="col-md-6 col-sm-6">
					<select name="lulusan" class="form-control" required>
						<option value="SMA">SMA</option>
						<option value="SMK">SMK</option>
						<option value="Paket C">Paket C</option>
						<option value="MA">MA</option>
						<option value="MAK">MAK</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi Yang dipilih</label>
				<div class="col-md-6 col-sm-6">
					<select name="prodi" class="form-control" required>
						<option value="Teknik Informatika">Teknik Informatika</option>
						<option value="Teknik Industri">Teknik Industri</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>

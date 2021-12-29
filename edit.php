<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET no_pendaftar dari URL
		if(isset($_GET['no_pendaftar'])){
			//membuat variabel $no_pendaftar untuk menyimpan no_pendaftar dari GET no_pendaftar di URL
			$no_pendaftar = $_GET['no_pendaftar'];

			//query ke database SELECT tabel identitas_pendaftar berdasarkan no_pendaftar = $no_pendaftar
			$select = mysqli_query($koneksi, "SELECT * FROM identitas_pendaftar WHERE no_pendaftar='$no_pendaftar'") or die(mysqli_error($koneksi));

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
		/*no_pendaftar, nama_lengkap, tempat_lahir, tgl_lahir, jenis_kelamin, agama, alamat, no_identitas, no_telepon, email, whatsapp, nama_ortu, lulusan, program_studi*/
		if(isset($_POST['submit'])){
			$nama_pendaftar			  = $_POST['nama_lengkap'];
			$tempat_lahir	= $_POST['tempat_lahir'];
			$tgl_lahir	= $_POST['tgl_lahir'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$agama	= $_POST['agama'];
			$alamat	= $_POST['alamat'];
			$no_identitas	= $_POST['no_identitas'];
			$no_telepon	= $_POST['no_telepon'];
			$email	= $_POST['email'];
			$whatsapp	= $_POST['whatsapp'];
			$nama_orangtua	= $_POST['nama_ortu'];
			$lulusan	= $_POST['lulusan'];
			$prodi	= $_POST['program_studi'];

			$sql = mysqli_query($koneksi, "UPDATE identitas_pendaftar SET nama_lengkap='$nama_pendaftar', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', agama='$agama', alamat='$alamat', no_identitas='$no_identitas', no_telepon='$no_telepon', email='$email', whatsapp='$whatsapp', nama_ortu='$nama_orangtua', lulusan='$lulusan', program_studi='$prodi' WHERE no_pendaftar='$no_pendaftar'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_pendaftar";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_pendaftar&no_pendaftar=<?php echo $no_pendaftar; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NO. Pendaftar</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_pendaftar" class="form-control" size="4" value="<?php echo $data['no_pendaftar']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Lengkap</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data['nama_lengkap']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tempat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data['tempat_lahir']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $data['tgl_lahir']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6">
					<select name="jenis_kelamin" class="form-control" required>
						<option value="<?php echo $data['jenis_kelamin']; ?>"><?php echo $data['jenis_kelamin']; ?></option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Agama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="agama" class="form-control" value="<?php echo $data['agama']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No Identitas</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_identitas" class="form-control" value="<?php echo $data['no_identitas']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No Telepon</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_telepon" class="form-control" value="<?php echo $data['no_telepon']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
				<div class="col-md-6 col-sm-6">
					<input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No Whatsapp</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="whatsapp" class="form-control" value="<?php echo $data['whatsapp']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Orangtua</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_ortu" class="form-control" value="<?php echo $data['nama_ortu']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Lulusan</label>
				<div class="col-md-6 col-sm-6">
					<select name="lulusan" class="form-control" required>
						<option value="<?php echo $data['lulusan']; ?>"><?php echo $data['lulusan']; ?></option>
						<option value="SMA">SMA</option>
						<option value="SMK">SMK</option>
						<option value="Paket C">Paket C</option>
						<option value="MA">MA</option>
						<option value="MAK">MAK</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi Yang Dipilih</label>
				<div class="col-md-6 col-sm-6">
					<select name="program_studi" class="form-control" required>
						<option value="<?php echo $data['program_studi']; ?>"><?php echo $data['program_studi']; ?></option>
						<option value="Teknik Informatika">Teknik Informatika</option>
						<option value="Teknik Industri">Teknik Industri</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_pendaftar" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>

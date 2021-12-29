<?php include "config.php";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cetak Kartu</title>
</head>
<body>
	<div class="container" style="margin-top:20px">
		<center><font size="6"></font></center>
		<table>
			<tr>
				<th><img src="assets/images/logo-sttc.png" width="90px" height="90px"></th>
				<th><font size="6"><center>Pendaftaran Calon Mahasiswa Baru<br>Sekolah Tinggi Teknologi Cipasung</font></th>
			</tr>
		</table>
		<hr>

		<?php
		//jika sudah mendapatkan parameter GET no_pendaftar dari URL
		if(isset($_GET['no_pendaftar'])){
			//membuat variabel $id untuk menyimpan no_pendaftar dari GET no_pendaftar di URL
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
			/*no_pendaftar, nama_lengkap, tempat_lahir, tgl_lahir, jenis_kelamin, agama, alamat, no_identitas, no_telepon, email, whatsapp, nama_ortu, lulusan, program_studi*/
		}
		?>

		<form>
			<table>
				<tr>
					<td>No. Pendaftar</td>
					<td>:</td>
					<td><?php echo $data['no_pendaftar'];?></td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td><?php echo $data['nama_lengkap'];?></td>
				</tr>
				<tr>
					<td>Tempat Lahir</td>
					<td>:</td>
					<td><?php echo $data['tempat_lahir'];?></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td><?php echo $data['tgl_lahir'];?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><?php echo $data['jenis_kelamin'];?></td>
				</tr>
				<tr>
					<td>Agama</td>
					<td>:</td>
					<td><?php echo $data['agama'];?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $data['alamat'];?></td>
				</tr>
				<tr>
					<td>No. Identitas</td>
					<td>:</td>
					<td><?php echo $data['no_identitas'];?></td>
				</tr>
				<tr>
					<td>No. Telepon</td>
					<td>:</td>
					<td><?php echo $data['no_telepon'];?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $data['email'];?></td>
				</tr>
				<tr>
					<td>No. Whatsapp</td>
					<td>:</td>
					<td><?php echo $data['whatsapp'];?></td>
				</tr>
				<tr>
					<td>Nama Orangtua</td>
					<td>:</td>
					<td><?php echo $data['nama_ortu'];?></td>
				</tr>
				<tr>
					<td>Lulusan</td>
					<td>:</td>
					<td><?php echo $data['lulusan'];?></td>
				</tr>
				<tr>
					<td>Program Studi Yang dipilih</td>
					<td>:</td>
					<td><?php echo $data['program_studi'];?></td>
				</tr>
			</table>
			<br><br>
		</form>
	</body>
	</html>
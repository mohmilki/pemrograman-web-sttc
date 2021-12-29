<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Calon Mahasiswa</font></center>
		<hr>
		<a href="index.php?page=tambah_pendaftar"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>No. Pendaftar</th>
					<th>Nama Lengkap</th>
					<th>Jenis Kelamin</th>
					<th>Lulusan</th>
					<th>Prodi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel identitas_pendaftar urut berdasarkan no_pendaftar yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM identitas_pendaftar ORDER BY no_pendaftar DESC") or die(mysqli_error($koneksi));
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
							<td>'.$data['no_pendaftar'].'</td>
							<td>'.$data['nama_lengkap'].'</td>
							<td>'.$data['jenis_kelamin'].'</td>
							<td>'.$data['lulusan'].'</td>
							<td>'.$data['program_studi'].'</td>
							<td>
								<a href="index.php?page=edit_pendaftar&no_pendaftar='.$data['no_pendaftar'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="cetak.php?no_pendaftar='.$data['no_pendaftar'].'" class="btn btn-secondary btn-sm">Cetak</a>
								<a href="delete.php?no_pendaftar='.$data['no_pendaftar'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
	</div>

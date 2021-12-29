<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET no_pendaftar dari URL
if(isset($_GET['no_pendaftar'])){
	//membuat variabel $no_pendaftaran yang menyimpan nilai dari $_GET['no_pendaftaran']
	$no_pendaftar = $_GET['no_pendaftar'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki no pendaftaran yang sama
	$cek = mysqli_query($koneksi, "SELECT * FROM identitas_pendaftar WHERE no_pendaftar='$no_pendaftar'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi no_pendaftar=$no_pendaftar
		$del = mysqli_query($koneksi, "DELETE FROM identitas_pendaftar WHERE no_pendaftar='$no_pendaftar'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil_pendaftar";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil_pendaftar";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil_pendaftar";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil_pendaftar";</script>';
}

?>

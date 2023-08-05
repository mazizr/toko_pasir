<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'db.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from karyawan where nama_pengguna='$username' and kata_sandi='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai pemilik
	if($data['role']=="pemilik"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['nama_karyawan'];
		$_SESSION['role'] = "pemilik";
		// alihkan ke halaman dashboard pemilik
		header("location:index_pemilik.php");
 
	// cek jika user login sebagai admin
	}else if($data['role']=="karyawan"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['nama_karyawan'];
		$_SESSION['id'] = $data['id_karyawan'];
		$_SESSION['role'] = "karyawan";
		// alihkan ke halaman dashboard karyawan
		header("location:data_barang_masuk.php");
 
	// cek jika user login sebagai pengurus
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=$password");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>
<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'db.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from karyawan where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai pemilik
	if($data['level']=="pemilik"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['nama_karyawan'];
		$_SESSION['level'] = "pemilik";
		// alihkan ke halaman dashboard pemilik
		header("location:index_pemilik.php");
 
	// cek jika user login sebagai admin
	}else if($data['level']=="admin"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['nama_karyawan'];
		$_SESSION['id'] = $data['id_karyawan'];
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:data_barang_masuk.php");
 
	// cek jika user login sebagai pengurus
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>
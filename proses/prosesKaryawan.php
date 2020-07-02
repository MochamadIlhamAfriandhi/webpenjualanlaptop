<?php
require '../models/modelKaryawan.php';
class prosesKaryawan
{
	private $action;

	function __construct($act){
		$this->action=$act;
	}

	function proses(){
		$objModel = new modelKaryawan();
		if ($this->action=="tambah"){
			$idKaryawan = $_POST['inputIDKaryawan'];
			$Username = $_POST['inputUsername'];
			$Password = $_POST['inputPassword'];
			$Nama = $_POST['inputNama'];
			$jnsKelamin = $_POST['inputJenisKelamin'];
			$Alamat = $_POST['inputAlamat'];
			$tglLahir = $_POST['inputTanggalLahir'];
			$noTelp = $_POST['inputNoTelepon'];
			$objModel->insertData($idKaryawan, $Username, $Password, $Nama, $jnsKelamin, $Alamat, $tglLahir, $noTelp);
			header("location:../views/viewKaryawan.php");	
		}else if($this->action=="hapus"){
			$id_Karyawan = $_GET['idKaryawan'];
			$objModel->deleteData($id_Karyawan);
			header("location:../views/viewKaryawan.php");
		}else if($this->action=="edit"){
			$idKaryawan = $_POST['inputIDKaryawan'];
			$Username = $_POST['inputUsername'];
			$Password = $_POST['inputPassword'];
			$Nama = $_POST['inputNama'];
			$jnsKelamin = $_POST['inputJenisKelamin'];
			$Alamat = $_POST['inputAlamat'];
			$tglLahir = $_POST['inputTanggalLahir'];
			$noTelp = $_POST['inputNoTelepon'];
			$objModel->insertData($idKaryawan, $Username, $Password, $Nama, $jnsKelamin, $Alamat, $tglLahir, $noTelp);
			header("location:../views/viewKaryawan.php");
		}
	}
}

$objProsesKaryawan = new prosesKaryawan($_GET['aksi']);
$objProsesKaryawan->proses();

?>
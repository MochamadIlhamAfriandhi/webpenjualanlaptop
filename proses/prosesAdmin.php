<?php
require '../models/modelAdmin.php';
class prosesAdmin
{
	private $action;

	function __construct($act){
		$this->action=$act;
	}

	function proses(){
		$objModel = new modelAdmin();
		if ($this->action=="tambah"){
			$idAdmin = $_POST['inputIDAdmin'];
			$Username = $_POST['inputUsername'];
			$Password = $_POST['inputPassword'];
			$Nama = $_POST['inputNama'];
			$jnsKelamin = $_POST['inputJenisKelamin'];
			$Alamat = $_POST['inputAlamat'];
			$tglLahir = $_POST['inputTanggalLahir'];
			$noTelp = $_POST['inputNoTelepon'];
			$objModel->insertData($idAdmin, $Username, $Password, $Nama, $jnsKelamin, $Alamat, $tglLahir, $noTelp);
			//header("location:../views/viewAdmin.php");	
		}else if($this->action=="hapus"){
			$id_Admin = $_GET['idAdmin'];
			$objModel->deleteData($id_Admin);
			header("location:../views/viewAdmin.php");
		}else if($this->action=="edit"){
			$idAdmin = $_POST['inputIDAdmin'];
			$Username = $_POST['inputUsername'];
			$Password = $_POST['inputPassword'];
			$Nama = $_POST['inputNama'];
			$jnsKelamin = $_POST['inputJenisKelamin'];
			$Alamat = $_POST['inputAlamat'];
			$tglLahir = $_POST['inputTanggalLahir'];
			$NoTelp = $_POST['inputNoTelp'];
			$objModel->updateData($idAdmin, $Username, $Password, $Nama, $jnsKelamin, $Alamat, $tglLahir, $NoTelp);
			//header("location:../views/viewAdmin.php");
		}
	}
}

$objProsesAdmin = new prosesAdmin($_GET['aksi']);
$objProsesAdmin->proses();

?>
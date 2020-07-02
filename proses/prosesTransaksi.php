<?php
require '../models/modelTransaksi.php';
class prosesTransaksi
{
	private $action;

	function __construct($act){
		$this->action=$act;
	}

	function proses(){
		$objModel = new modelTransaksi();
		if ($this->action=="tambah"){
			$idTransaksi = $_POST['inputIDTransaksi'];
			$idKaryawan = $_POST['inputIDKaryawan'];
			$namaPembeli = $_POST['inputNamaPembeli'];
			$Total = $_POST['inputTotal'];
			$Bayar = $_POST['inputBayar'];
			$Kembalian = $_POST['inputKembalian'];
			$objModel->insertData($idTransaksi, $idKaryawan, $idNamaPembeli, $Total, $Bayar, $Kembalian);
			header("location:../views/indexKaryawan.php");	
		}else if($this->action=="hapus"){
			$id_Produk = $_GET['idkaryawan'];
			$objModel->deleteData($id_Produk);
			header("location:../views/indexKaryawan.php");
		}else if($this->action=="edit"){
			$idTransaksi = $_POST['inputIDTransaksi'];
			$idKaryawan = $_POST['inputIDKaryawan'];
			$namaPembeli = $_POST['inputNamaPembeli'];
			$Total = $_POST['inputTotal'];
			$Bayar = $_POST['inputBayar'];
			$Kembalian = $_POST['inputKembalian'];
			$objModel->insertData($idTransaksi, $idKaryawan, $idNamaPembeli, $Total, $Bayar, $Kembalian);
			header("location:../views/indexKaryawan.php");
		}
	}
}

$objProsesTransaksi = new prosesTransaksi($_GET['aksi']);
$objProsesTransaksi->proses();

?>
<?php
require '../models/modelProduk.php';
class prosesProduk
{
	private $action;

	function __construct($act){
		$this->action=$act;
	}

	function proses(){
		$objModel = new modelProduk();
		if ($this->action=="tambah"){
			$idProduk = $_POST['inputIDProduk'];
			$idAdmin = $_POST['inputIDAdmin'];
			$nmProduk = $_POST['inputNamaProduk'];
			$jnsProduk = $_POST['inputJenisProduk'];
			$stokProduk = $_POST['inputStokProduk'];
			$hargaProduk = $_POST['inputHargaProduk'];
			$objModel->insertData($idProduk, $idAdmin, $nmProduk, $jnsProduk, $stokProduk, $hargaProduk);
			header("location:../views/inputProduk.php");	
		}else if($this->action=="hapus"){
			$id_Produk = $_GET['idproduk'];
			$objModel->deleteData($id_Produk);
			header("location:../views/viewProduk.php");
		}else if($this->action=="edit"){
			$idProduk = $_POST['inputIDProduk'];
			$idAdmin = $_POST['inputIDAdmin'];
			$nmProduk = $_POST['inputNamaProduk'];
			$jnsProduk = $_POST['inputJenisProduk'];
			$stokProduk = $_POST['inputStokProduk'];
			$hargaProduk = $_POST['inputHargaProduk'];
			$objModel->updateData($idProduk, $idAdmin, $nmProduk, $jnsProduk, $stokProduk, $hargaProduk);
			header("location:../views/viewProduk.php");
		}
	}
}

$objProsesProduk = new prosesProduk($_GET['aksi']);
$objProsesProduk->proses();

?>
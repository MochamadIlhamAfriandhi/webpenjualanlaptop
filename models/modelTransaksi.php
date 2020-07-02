<?php
require 'koneksiDB.php';

class modelTransaksi extends koneksiDB{
	private $dataTransaksi;

	function select(){
		$sqltext = "SELECT * FROM Transaksi_06943";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		while($row = oci_fetch_array($statement, OCI_BOTH)){
			$temp[] = $row;
		}
		return $this->dataProduk = $temp;

		oci_free_statement($statement);
	}

	function insertData($IDT, $IDK, $NMP, $Total, $Bayar, $Kembalian){
		$sqltext = "INSERT INTO Produk_06943 VALUES('$IDT','$IDK', '$NMP', '$Total', '$Bayar', '$Kembalian')";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function getData(){
		return $this->dataTransaksi;
	}

	function viewData(){
		foreach ($this->dataTransaksi as $key) {
			echo $key['ID_TRANSAKSI'];
			echo " -> ";
			echo $key['ID_KARYAWAN'];
			echo " -> ";
			echo $key['NAMAPEMBELI_06943'];
			echo " -> ";
			echo $key['TOTAL'];
			echo " -> ";
			echo $key['BAYAR'];
			echo " -> ";
			echo $key['KEMBALIAN'];
			echo "<br>";
		}
	}

	function deleteData($IDT){
		$sqltext = "DELETE FROM Transaksi_06943 WHERE ID_TRANSAKSI = '$IDT'";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function updateData($IDT, $IDK, $NMP, $TOTAL, $BAYAR, $KEMBALIAN){
		$sqltext = "UPDATE Transaksi_06943 SET ID_TRANSAKSI = '$IDT', ID_KARYAWAN = '$IDK', NAMAPEMBELI_06943 = '$NMP', TOTAL = '$TOTAL', BAYAR = '$BAYAR', KEMBALIAN = '$KEMBALIAN' WHERE ID_TRANSAKSI = '$IDT'";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}
}
//$objModelProduk = new modelProduk();
//$objModelProduk->insertData('4','1', 'Heatsink', 'Hardware', '10', '5000000');
//$objModelProduk->select();
//$objModelProduk->viewData();
//$objModelProduk->updateData('3', '1', 'RAM', 'Hardware', '10', '500000');
//$objModelProduk->deleteData('LP02');
?>

<?php
require 'koneksiDB.php';

class modelProduk extends koneksiDB{
	private $dataProduk;

	function select(){
		$sqltext = "SELECT * FROM Produk_06943";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		while($row = oci_fetch_array($statement, OCI_BOTH)){
			$temp[] = $row;
		}
		return $this->dataProduk = $temp;

		oci_free_statement($statement);
	}

	function insertData($IDP, $IDA, $NMP, $JP, $STOK, $HARGA){
		$sqltext = "INSERT INTO Produk_06943 VALUES('$IDP','$IDA', '$NMP', '$JP', '$STOK', '$HARGA')";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function getData(){
		return $this->dataProduk;
	}

	function viewData(){
		foreach ($this->dataProduk as $key) {
			echo $key['ID_PRODUK'];
			echo " -> ";
			echo $key['ID_ADMIN'];
			echo " -> ";
			echo $key['NAMA_PRODUK'];
			echo " -> ";
			echo $key['JENIS_PRODUK'];
			echo " -> ";
			echo $key['STOK'];
			echo " -> ";
			echo $key['HARGA'];
			echo "<br>";
		}
	}

	function deleteData($IDP){
		$sqltext = "DELETE FROM Produk_06943 WHERE ID_PRODUK = '$IDP'";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function updateData($IDP, $IDA, $NMP, $JP, $STOK, $HARGA){
		$sqltext = "UPDATE Produk_06943 SET ID_ADMIN = '$IDA', NAMA_PRODUK = '$NMP', JENIS_PRODUK = '$JP', STOK = '$STOK', HARGA = '$HARGA' WHERE ID_PRODUK = '$IDP'";
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

<?php
require 'koneksiDB.php';

class modelAdmin extends koneksiDB{
	private $dataAdmin;

	function select(){
		$sqltext = "SELECT * FROM Admin_06943";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		while($row = oci_fetch_array($statement, OCI_BOTH)){
			$temp[] = $row;
		}
		$this->dataAdmin = $temp;

		oci_free_statement($statement);
	}

	function insertData($IDA, $Username, $Password, $Nama, $JK, $Alamat, $TL, $Telp){
		$sqltext = "INSERT INTO Admin_06943 VALUES('$IDA','$Username', '$Password', '$Nama', '$JK', '$Alamat', '$TL', '$Telp')";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function getData(){
		return $this->dataAdmin;
	}

	function viewData(){
		foreach ($this->dataAdmin as $key) {
			echo $key['ID_KARYAWAN'];
			echo " -> ";
			echo $key['USERNAME'];
			echo " -> ";
			echo $key['PASSWORD'];
			echo " -> ";
			echo $key['NAMA'];
			echo " -> ";
			echo $key['JENIS_KELAMIN'];
			echo " -> ";
			echo $key['ALAMAT'];
			echo " -> ";
			echo $key['TANGGAL_LAHIR'];
			echo " -> ";
			echo $key['NO_TELP'];
			echo "<br>";
		}
	}

	function deleteData($IDA){
		$sqltext = "DELETE FROM Admin_06943 WHERE ID_ADMIN = '$IDA'";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function updateData($IDA, $Username, $Password, $Nama, $JK, $Alamat, $TL, $Notlp){
		$sqltext = "UPDATE Admin_06943 SET ID_ADMIN = '$IDA', USERNAME = 'Username', PASSWORD = 'Password', NAMA = '$Nama', JENIS_KELAMIN = '$JK', ALAMAT = '$Alamat', TANGGAL_LAHIR = '$TL', NO_TELP = 'Notlp' WHERE ID_ADMIN = '$IDA'";
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

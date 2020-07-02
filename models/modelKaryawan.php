<?php
require 'koneksiDB.php';

class modelKaryawan extends koneksiDB{
	private $dataKaryawan;

	function select(){
		$sqltext = "SELECT * from Karyawan_06943";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);

		while($row = oci_fetch_array($statement, OCI_BOTH)){
			$temp[] = $row;
		}
		$this->dataKaryawan = $temp;

		oci_free_statement($statement);
	}

	function insertData($IDK, $Username, $Password, $Nama, $JK, $Alamat, $TL, $No_Telp){
		$sqltext = "INSERT INTO Karyawan_06943 VALUES('$IDK','$Username', '$Password', '$Nama', '$JK', '$Alamat', '$TL', '$No_Telp')";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function getData(){
		return $this->dataKaryawan;
	}

	function viewData(){
		foreach ($this->dataKaryawan as $key) {
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

	function deleteData($IDK){
		$sqltext = "DELETE FROM Karyawan_06943 WHERE ID_KARYAWAN = '$IDK'";
		$statement = oci_parse($this->koneksi, $sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	function updateData($IDK, $Username, $Password, $Nama, $JK, $Alamat, $TL, $No_Telp){
		$sqltext = "UPDATE Karyawan_06943 SET ID_KARYAWAN = '$IDK', USERNAME = 'Username', PASSWORD = 'Password', NAMA = '$Nama', JENIS_KELAMIN = '$JK', ALAMAT = '$Alamat', TANGGAL_LAHIR = '$TL', NO_TELP = 'No_Telp' WHERE ID_KARYAWAN = '$IDK'";
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

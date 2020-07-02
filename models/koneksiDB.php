<?php
class koneksiDB
{
	private $uname = 'M_ILHAM_06943';
	private $pass = 'ILHAM';
	private $host = 'localhost/XE';
	protected $koneksi;

	function __construct()
	{
		$konek = oci_connect($this->uname, $this->pass, $this->host);
		if($konek)
		{
			//echo "Berhasil Terkoneksi";
			$this->koneksi = $konek;
		}
		else
		{
			echo "Gagal";
		}
	}
}

$objKoneksi = new koneksiDB();

?>
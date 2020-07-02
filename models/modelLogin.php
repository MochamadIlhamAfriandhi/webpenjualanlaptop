<?php
require "koneksiDB.php";
class modelLogin extends koneksiDB{
    private $cekAdmin;
    private $Admin;
    private $cekKaryawan;
    private $Karyawan;

    function cekAdmin($user,$pass){
        $sqltext = "SELECT COUNT(*) FROM ADMIN_06943 WHERE USERNAME='$user' AND PASSWORD='$pass'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $key=oci_fetch_array($statement,OCI_BOTH);
        $this->cekAdmin = $key["COUNT(*)"];
        oci_free_statement($statement);
    }

    function getCekAdmin(){
        return $this->cekAdmin;
    }

    function Admin($user,$pass){
        $sqltext = "SELECT * FROM ADMIN_06943 WHERE USERNAME='$user' AND PASSWORD='$pass'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $key=oci_fetch_array($statement,OCI_BOTH);
        $this->Admin=$key;
    }

    function getAdmin(){
        return $this->Admin;
    }

    function cekKaryawan($user,$pass){
        $sqltext = "SELECT COUNT(*) FROM KARYAWAN_06943 WHERE USERNAME='$user' AND PASSWORD='$pass'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $key=oci_fetch_array($statement,OCI_BOTH);
        $this->cekKaryawan = $key["COUNT(*)"];
        oci_free_statement($statement);
    }

    function getCekKaryawan(){
        return $this->cekKaryawan;
    }

    function Karyawan($user,$pass){
        $sqltext = "SELECT * FROM KARYAWAN_06943 WHERE USERNAME='$user' AND PASSWORD='$pass'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $key=oci_fetch_array($statement,OCI_BOTH);
        $this->Karyawan=$key;
    }

    function getKaryawan(){
        return $this->Karyawan;
    }

}

?>
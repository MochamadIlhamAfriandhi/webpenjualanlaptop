<?php
require "../models/modelLogin.php";

class prosesLogin{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 

    function proses(){
        $objlogin = new modellogin();
        if($this->action=="loginadmin"){
            $userAdmin = $_POST['usernameAdmin'];
            $passAdmin = $_POST['passwordAdmin'];
            if($objlogin->getCekAdmin()==1){
                $objlogin->Admin($userAdmin, $passAdmin);
                $Admin = $objlogin->getAdmin();
                $_SESSION["admin"] = $Admin;
                echo "<script>alert('Berhasil');</script>";
                echo "<script>location='../views/index.php'</script>";
            }else{
                echo "<script>alert('Admin tidak terdaftar');</script>";
                echo "<script>location='../views/login.php'</script>";
            }
        }
        elseif($this->action=="loginkaryawan"){
            $userKaryawan=$_POST["usernameKaryawan"];
            $passKaryawan=$_POST["passwordKaryawan"];
            $objlogin->cekKaryawan($userKaryawan, $passKaryawan);
            if($objlogin->getCekKaryawan()==1){
                $objlogin->Karyawan($userKaryawan, $passKaryawan);
                $Karyawan = $objlogin->getKaryawan();
                $_SESSION["karyawan"] = $Karyawan;
                echo "<script>alert('Berhasil');</script>";
                echo "<script>location='../views/indexKaryawan.php'</script>";
            }else{
                echo "<script>alert('Karyawan tidak terdaftar');</script>";
                echo "<script>location='../views/login.php'</script>";
            }
        }
    }
}

$objproseslogin = new proseslogin($_GET['aksi']);
$objproseslogin->proses();

?>
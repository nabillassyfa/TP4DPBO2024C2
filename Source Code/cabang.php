<?php
// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/C_cabang.php");

$cabang = new CabangController();

if (isset($_POST['add'])) {
    $data = array(
        'nama_cabang' => $_POST['nama_cabang']
    );
    $cabang->add($data);
} else if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $cabang->delete($id);
} else if (isset($_GET['edit'])) {
    $id =  $_GET['edit'];
    $cabang->formUpdate($id);
} else if (isset($_POST['ubah'])){
    $id = $_POST['cabang_id'];
    $data = array(
        'nama_cabang' => $_POST['nama_cabang']
    );
    $cabang->edit($id, $data);
} else{
    $cabang->index();
}

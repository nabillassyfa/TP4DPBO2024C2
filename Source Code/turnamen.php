<?php
// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/C_turnamen.php");

$turnamen = new TurnamenController();

if (isset($_POST['add'])) {
    $data = array(
        'nama_turnamen' => $_POST['nama_turnamen'],
        'lokasi' =>$_POST['lokasi']
    );
    $turnamen->add($data);
} else if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $turnamen->delete($id);
} else if (isset($_GET['edit'])) {
    $id =  $_GET['edit'];
    $turnamen->formUpdate($id);
} else if (isset($_POST['ubah'])){
    $id = $_POST['turnamen_id'];
    $data = array(
        'nama_turnamen' => $_POST['nama_turnamen'],
        'lokasi' =>$_POST['lokasi']
    );
    $turnamen->edit($id, $data);
} else{
    $turnamen->index();
}

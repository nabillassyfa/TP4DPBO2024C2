<?php
// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/c_members.php");

$member = new MembersController();

 if (isset($_GET['detail'])) {
    $id = $_GET['detail'];
    $member->detaildata($id);
} else if (isset($_GET['tambah'])) {
    $member->formTambahData();
} else if (isset($_POST['btn-add'])) {
    $data = array(
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'phone'=>$_POST['phone'],
        'join_date'=>$_POST['join_date'],
        'cabang_id'=>$_POST['cabang_id']
    );
    $member->add($data);
} else if (isset($_POST['add-hasil'])) {
    $member_id = $_POST['member_id'];
    $data = array(
        'member_id' => $member_id,
        'turnamen_id' => $_POST['turnamen_id'],
        'mendali_id' => $_POST['mendali_id']
    );
    $member->addHasil($data);
}else if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
     $member->delete($id);
    //print_r($id);
}else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $data = array(
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'phone'=>$_POST['phone'],
        'join_date'=>$_POST['join_date'],
        'cabang_id'=>$_POST['cabang_id']
    );
    $member->edit($id, $data);
}else if (isset($_GET['ubah'])) {
    $id = $_GET['ubah'];
     $member->formUpdate($id);
}else{
    $member->index();
}

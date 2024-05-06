<?php

// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin

include_once("connection.php");
include_once("models/M_cabang.php");
include_once("views/v_cabang.php");

class CabangController {
  private $cabang;

  function __construct(){
    $this->cabang = new Cabang (Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->cabang->open();
    $this->cabang->getCabang();
    $data = array();
    while($row = $this->cabang->getResult()){
      array_push($data, $row);
    }

    $this->cabang->close();

    $view = new CabangView();
    $view->render($data);
  }
  
  function add($data){
    $this->cabang->open();
    $result = $this->cabang->addCabang($data);
    if ($result){
			echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'cabang.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'cabang.php';
            </script>";
		}
    $this->cabang->close();
  }

  function edit($id, $data){
    $this->cabang->open();
    $result = $this->cabang->updateCabang($id, $data);
    if ($result){
        echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'cabang.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah!');
            document.location.href = 'cabang.php';
        </script>";
    }
    $this->cabang->close();
  }

  function delete($id){
    $this->cabang->open();
    $result = $this->cabang->deleteCabang($id);
    if ($result){
        echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'cabang.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = 'cabang.php';
        </script>";
    }
    $this->cabang->close();
  }

  function formUpdate ($id){
    $this->cabang->open();
    $this->cabang->getCabangbyId($id);
    $row = $this->cabang->getResult();
    $data = array(
        'cabang_id' => $id,
        'nama_cabang' => $row['nama_cabang']
    );

    $this->cabang->close();
    $view = new CabangView();
    $view->editData($data);
  }

  function dataCabang(){
    $this->cabang->open();
    $this->cabang->getCabang();
    $data = array();
    while($row = $this->cabang->getResult()){
      array_push($data, $row); // Append each row to the $data array
    }
    $this->cabang->close();
    return $data; // Return the populated array
  }
}
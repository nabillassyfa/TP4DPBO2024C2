<?php

// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin

include_once("connection.php");
include_once("models/M_Turnamen.php");
include_once("views/v_turnamen.php");

class TurnamenController {
  private $Turnamen;

  function __construct(){
    $this->turnamen = new Turnamen (Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->turnamen->open();
    $this->turnamen->getTurnamen();
    $data = array();
    while($row = $this->turnamen->getResult()){
      array_push($data, $row);
    }

    $this->turnamen->close();

    $view = new TurnamenView();
    $view->render($data);
  }
  
  function add($data){
    $this->turnamen->open();
    $result = $this->turnamen->addTurnamen($data);
    if ($result){
			echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'turnamen.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'turnamen.php';
            </script>";
		}
    $this->turnamen->close();
  }

  function edit($id, $data){
    $this->turnamen->open();
    $result = $this->turnamen->updateTurnamen($id, $data);
    if ($result){
        echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'turnamen.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah!');
            document.location.href = 'turnamen.php';
        </script>";
    }
    $this->turnamen->close();
  }

  function delete($id){
    $this->turnamen->open();
    $result = $this->turnamen->deleteTurnamen($id);
    if ($result){
        echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'turnamen.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = 'turnamen.php';
        </script>";
    }
    $this->turnamen->close();
  }

  function formUpdate ($id){
    $this->turnamen->open();
    $this->turnamen->getTurnamenbyId($id);
    $row = $this->turnamen->getResult();
    $data = array(
        'turnamen_id' => $id,
        'nama_turnamen' => $row['nama_turnamen'],
        'lokasi' => $row ['lokasi']
    );

    $this->turnamen->close();
    $view = new turnamenView();
    $view->editData($data);
  }
}
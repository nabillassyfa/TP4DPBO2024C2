<?php

// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin

include_once("connection.php");
include_once("models/M_Members.php");
include_once("models/M_cabang.php");
include_once("models/M_hasil.php");
include_once("models/M_turnamen.php");
include_once("views/v_members.php");
include_once("views/v_detail.php");


class MembersController {
  private $members;
  private $cabang;
  private $turnamen;

  function __construct(){
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->cabang = new Cabang (Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->hasil = new Hasil (Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->turnamen = new Turnamen (Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->members->getmembers();
    $this->cabang->open();
    $this->cabang->getCabang();
    $data = array(
      'members' => array (),
      'cabang' => array(),
    );
    while($row = $this->members->getResult()){
      array_push($data['members'], $row);
    }
    while($row = $this->cabang->getResult()){
      array_push($data['cabang'], $row);
    }

    $this->members->close();
    $this->cabang->close();

    $view = new MembersView();
    $view->render($data);
  }

  function detaildata ($id){
    $this->members->open();
    $this->hasil->open();
    $this->turnamen->open();

    $this->turnamen->getTurnamen();
    $this->members->getMembersById($id);
    $this->hasil->getHasilbyMember($id);

    $prestasi = array();
    while ($col = $this->hasil->getResult()){
      $prestasi[] = array($col['nama_turnamen'], $col['jenis_mendali'], $col['lokasi']);
    }

    $lomba = array();
    while ($tur = $this->turnamen->getResult()){
      $lomba[] = array($tur['turnamen_id'], $tur['nama_turnamen']);
    }


    $row = $this->members->getResult();
    $data = array(
        'id' => $id,
        'name' => $row['name'],
        'email' => $row['email'],
        'phone' => $row['phone'],
        'join_date'=> $row['join_date'],
        'nama_cabang' => $row['nama_cabang']
    );
    
    $this->members->close();
    $this->hasil->close();
    $this->turnamen->close();
    $view = new DetailData();
    $view->render($data, $prestasi, $lomba);
  }

  

  
  function add($data){
    $this->members->open();
    $result = $this->members->add($data);
    if ($result){
			echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'index.php';
            </script>";
		}
    $this->members->close();
  }

  function addHasil($data){
    $this->hasil->open();
    $result = $this->hasil->addHasil($data);
    if ($result){
			echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'index.php';
            </script>";
		}
    $this->hasil->close();
  }

  function edit($id, $data){
    $this->members->open();
    $result = $this->members->updateMembers($id, $data);
    if ($result){
      echo "<script>
          alert('Data berhasil diubah!');
          document.location.href = 'index.php';
      </script>";
    } else {
      echo "<script>
          alert('Data gagal diubah!');
          document.location.href = 'index.php';
      </script>";
    }
    $this->members->close();
    
  }

  function delete($id){
    $this->members->open();
    $result = $this->members->delete($id);
    if ($result){
      echo "<script>
          alert('Data berhasil dihapus!');
          document.location.href = 'index.php';
      </script>";
    } else {
      echo "<script>
          alert('Data gagal dihapus!');
          document.location.href = 'index.php';
      </script>";
    }
    $this->members->close();
  }

  function formUpdate ($id){
    $this->members->open();
    $this->members->getMembersbyId($id);
    $row = $this->members->getResult();
    $data = array(
        'id' => $id,
        'name' => $row['name'],
        'email' => $row['email'],
        'phone' => $row['phone'],
        'join_date'=> $row['join_date'],
        'nama_cabang' => $row['nama_cabang']
    );

    $this->members->close();
    $view = new MembersView();
    $view->editData($data);
  }
}
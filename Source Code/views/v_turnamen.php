<?php

// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin


include_once("controllers/C_turnamen.php");
class TurnamenView {
  public function render ($data){
    $no = 1;
    $dataTurnamen = null;
    foreach($data as $val){
      list($id, $nama, $lokasi) = $val;
      $dataTurnamen .= "<tr>
      <td>" . $no++ . "</td>
      <td>" . $nama . "</td>
      <td>" . $lokasi . "</td>
      <td>
        <a class='btn btn-success' href='turnamen.php?edit=" .$id. "'>Edit</a>
        <a class='btn btn-danger' href='turnamen.php?hapus=" .$id. "'  onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
      </td>
      </tr>
      ";
    }
    $tpl = new Template("templates/T_turnamen.html");
    $tpl->replace("DATA_MEMBERS", $dataTurnamen); 
    $tpl->write(); 
  }

  public function editData($data){
    $nama_turnamen = $data['nama_turnamen'];
    $turnamen_id = $data['turnamen_id'];
    $lokasi = $data['lokasi'];

    $data = null;
    $data.= '
    <div class="modal-dialog">
        <form action="turnamen.php" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" >Ubah turnamen Lomba</h1>
                </div>
                <input type="hidden" name="turnamen_id" value="' . $turnamen_id . '">
                <div class="modal-body">
                    <div class="mb-6">
                        <label for="exampleFormControlInput1" class="form-label">Nama turnamen </label>
                        <input type="text" class="form-control" name="nama_turnamen" value="'.$nama_turnamen.'" required>
                    </div>
                    <div class="mb-6">
                        <label for="exampleFormControlInput1" class="form-label">Lokasi turnamen </label>
                        <input type="text" class="form-control" name="lokasi" value="'.$lokasi.'" required>
                    </div>
                    <div class="modal-footer">
                      <a href="turnamen.php" type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</a>
                      <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
                    </div>
                </div>
            </div>
        </form>
    </div>';
    $tpl = new Template("templates/T_update.html");
    $tpl->replace("DATA_ATLET", $data); 
    $tpl->write(); 
  }
}
?>
<?php

// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin


include_once("controllers/C_cabang.php");
class CabangView {
  public function render ($data){
    $no = 1;
    $dataCabang = null;
    foreach($data as $val){
      list($id, $nama) = $val;
      $dataCabang .= "<tr>
      <td>" . $no++ . "</td>
      <td>" . $nama . "</td>
      <td>
        <a class='btn btn-success' href='cabang.php?edit=" .$id. "'>Edit</a>
        <a class='btn btn-danger' href='cabang.php?hapus=" .$id. "'  onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
      </td>
      </tr>
      ";
    }
    $tpl = new Template("templates/T_cabang.html");
    $tpl->replace("DATA_MEMBERS", $dataCabang); 
    $tpl->write(); 
  }

  public function editData($data){
    $nama_cabang = $data['nama_cabang'];
    $cabang_id = $data['cabang_id'];

    $data = null;
    $data.= '
    <div class="modal-dialog">
        <form action="cabang.php" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" >Ubah Cabang Lomba</h1>
                </div>
                <input type="hidden" name="cabang_id" value="' . $cabang_id . '">
                <div class="modal-body">
                    <div class="mb-6">
                        <label for="exampleFormControlInput1" class="form-label">Nama Cabang </label>
                        <input type="text" class="form-control" name="nama_cabang" value="'.$nama_cabang.'" required>
                    </div>
                <div class="modal-footer">
                    <a href="cabang.php" type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
                </div>
            </div>
        </form>
      </div>
    </div>';
    $tpl = new Template("templates/T_update.html");
    $tpl->replace("DATA_ATLET", $data); 
    $tpl->write(); 
  }
}
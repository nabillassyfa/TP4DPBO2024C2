<?php

// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin


include_once("controllers/c_members.php");
include_once("controllers/C_cabang.php");
class MembersView {
  public function render ($data){
    
    $no = 1;
    $dataBuku = null;
    $dataCabang = null;
    foreach($data['members'] as $val){
      list($id, $name, $email, $phone, $join_date, $cabang_id) = $val;
      $dataBuku .= "<tr>
      <td>" . $no++ . "</td>
      <td>" . $name . "</td>
      <td>" . $email . "</td>
      <td>" . $phone . "</td>
      <td>" . $join_date . "</td>";
      foreach($data['cabang'] as $cabang){
        if($cabang['cabang_id'] == $cabang_id){
          $nama_cabang = $cabang['nama_cabang'];
          $dataBuku.= "<td>" . $nama_cabang . "</td>";
        }
      }
      $dataBuku .= "<td>
        <a class='btn btn-success' href='index.php?detail=" .$id. "'>Detail</a>
      </td>
      </tr>
      ";
    }
   
    foreach($data['cabang'] as $val){
      list($id, $nama) = $val;
      $dataCabang .= "<option value='".$id."'>".$nama."</option>";
    }

    $tpl = new Template("templates/T_index.html");
    $tpl->replace("DATA_MEMBERS", $dataBuku); 
    $tpl->replace("DATA_CABANG", $dataCabang); 
    $tpl->write(); 
  }

  public function editData ($data){
    $cabang = new CabangController();
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $join_date= $data['join_date'];
    $nama_cabang = $data['nama_cabang'];
    $dataCabang = null;
    $temp = $cabang->dataCabang();

    $data = null;
    $data.= '
    <div class="modal-dialog">
      <form action="index.php" method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" >Ubah Data Atlet</h1>
              </div>
              <input type="hidden" name="id" value="' . $id . '">
              <div class="modal-body">
                  <div class="mb-6">
                      <label for="exampleFormControlInput1" class="form-label">Nama </label>
                      <input type="text" class="form-control" name="name" value="'.$name.'" required>
                  </div>
                  <div class="mb-6">
                      <label for="exampleFormControlInput1" class="form-label">Email</label>
                      <input type="text" class="form-control" name="email" value="'.$email.'" required>
                  </div>
                  <div class="mb-6">
                      <label for="exampleFormControlInput1" class="form-label">No Handphone </label>
                      <input type="text" class="form-control" name="phone" value="'.$phone.'" required>
                  </div>
                  <div class="mb-6">
                      <label for="exampleFormControlInput1" class="form-label">Tanggal Gabung </label>
                      <input type="text" class="form-control" name="join_date" value="'.$join_date.'" required>
                  </div>
                  <div class="mb-6">
                      <label for="exampleFormControlInput1" class="form-label">Nama Cabang</label>
                      <select  name="cabang_id" class="form-control me-2">';
                      foreach($temp as $val){
                        list($id, $nama) = $val;
                        if ($nama == $nama_cabang) { 
                          $data .= "<option value='" . $id . "' selected>" . $nama . "</option>";
                        } else {
                            $data .= "<option value='" . $id . "'>" . $nama . "</option>";
                        }
                      }
                    $data.= '</select>
                  </div>
                  <div class="modal-footer">
                    <a href="index.php" type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary" name="edit">Ubah</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>';
    $tpl = new Template("templates/T_update.html");
    $tpl->replace("DATA_ATLET", $data); 
    $tpl->write(); 
  }
}
?>
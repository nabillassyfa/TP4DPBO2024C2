<?php

// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin

include_once("controllers/c_members.php");
class DetailData {
  public function render ($data, $prestasi, $lomba){
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $join_date= $data['join_date'];
    $nama_cabang = $data['nama_cabang'];

    $data = null;
    $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $name . '</h3>
        </div>
        <div class="card-body text-end">
        <form action="#" method="POST">
            <div class="row mb-12">
                <div class="col-12">
                    <div class="col-12">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>' . $name . '</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>' . $email . '</td>
                                </tr>
                                <tr>
                                    <td>No Handphone</td>
                                    <td>:</td>
                                    <td>' . $phone . '</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Gabung</td>
                                    <td>:</td>
                                    <td>' . $join_date . '</td>
                                </tr>
                                <tr>
                                    <td>Nama Cabang</td>
                                    <td>:</td>
                                    <td>' . $nama_cabang . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>';

            $pres = null;
            if ($prestasi){
                $no = 1;
                foreach($prestasi as $val){
                    list( $nama_turnamen, $jenis_mendali, $lokasi) = $val;
                    $pres.="<tr>
                    <td>" . $no++ . "</td>
                    <td>" .$nama_turnamen."</td>
                    <td>" . $jenis_mendali . "</td>
                    <td>" . $lokasi . "</td>
                    </tr>";
                }
            }
            
            
            $data.='<div class="card-footer text-end">
            <a href="index.php?ubah=' . $id . '"><button type="button" class="btn btn-success text-white">Ubah Data</button></a>
            <a class="btn btn-danger" href="index.php?hapus=' .$id. '"  onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Hapus</a>
            </form>
            </div>';

            $dataTurnamen = null;
            foreach($lomba as $val){
                list($id_lomba, $nama) = $val;
                $dataTurnamen .= "<option value='".$id_lomba."'>".$nama."</option>";
              }

            $dataid=null;
            $dataid.='
            <input type="hidden" name="member_id" value="'.$id.'">';

        $tpl = new Template("templates/T_detail.html");
        $tpl->replace("DATA_ATLET", $data); 
        $tpl->replace("DATA_PRESTASI", $pres); 
        $tpl->replace("ID_MEMBER", $dataid); 
        $tpl->replace("DATA_TURNAMEN", $dataTurnamen);
        $tpl->write(); 
    }
}
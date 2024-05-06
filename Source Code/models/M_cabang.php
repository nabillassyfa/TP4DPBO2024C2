<?php

// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin

include_once("models/DB.class.php");

class Cabang extends DB
{
    function getCabang()
    {
        $query = "SELECT * FROM cabang";
        return $this->execute($query);
    }

    function getCabangbyId($id)
    {
        $query = "SELECT * FROM cabang WHERE cabang_id='$id'";
        return $this->execute($query);
    }

    function addCabang($data)
    {
        $nama_cabang = $data['nama_cabang'];

        $query = " INSERT INTO `cabang`(`nama_cabang`) VALUES ( '$nama_cabang')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function deleteCabang($id)
    {

        $query = "DELETE from `cabang` where cabang_id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function updateCabang($id, $data)
    {

        $nama_cabang=$data["nama_cabang"];

        $query = "UPDATE cabang SET nama_cabang='$nama_cabang' where cabang_id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

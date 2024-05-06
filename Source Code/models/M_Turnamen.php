<?php

// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin


include_once("models/DB.class.php");

class Turnamen extends DB
{
    function getTurnamen()
    {
        $query = "SELECT * FROM turnamen";
        return $this->execute($query);
    }

    function getTurnamenbyId($id)
    {
        $query = "SELECT * FROM turnamen WHERE turnamen_id='$id'";
        return $this->execute($query);
    }

    function addTurnamen($data)
    {
        $nama_turnamen = $data['nama_turnamen'];
        $lokasi = $data['lokasi'];

        $query = " INSERT INTO turnamen (nama_turnamen, lokasi) VALUES ('$nama_turnamen','$lokasi')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function deleteTurnamen($id)
    {

        $query = "DELETE from turnamen where turnamen_id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function updateTurnamen($id, $data)
    {

        $nama_turnamen = $data['nama_turnamen'];
        $lokasi = $data['lokasi'];

        $query = "UPDATE turnamen SET nama_turnamen='$nama_turnamen', lokasi='$lokasi' where turnamen_id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

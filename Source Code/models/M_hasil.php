<?php

// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin

include_once("models/DB.class.php");

class Hasil extends DB
{
    function getHasil()
    {
        $query = "SELECT * FROM hasil_lomba";
        return $this->execute($query);
    }

    function getHasilbyMember($id)
    {
        $query = "SELECT * FROM hasil_lomba JOIN turnamen ON hasil_lomba.turnamen_id=turnamen.turnamen_id JOIN mendali ON hasil_lomba.mendali_id=mendali.mendali_id WHERE member_id='$id'";
        return $this->execute($query);
    }

    function addHasil($data)
    {
        $member_id = $data['member_id'];
        $turnamen_id = $data['turnamen_id'];
        $mendali_id = $data['mendali_id'];

        $query = " INSERT INTO hasil_lomba (member_id, turnamen_id, mendali_id) VALUES ('$member_id','$turnamen_id', '$mendali_id')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function deleteHasil($id)
    {

        $query = "DELETE from hasil_lomba where hasil_id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function updateHasil($id, $data)
    {

        $member_id = $data['member_id'];
        $turnamen_id = $data['turnamen_id'];
        $mendali_id = $data['mendali_id'];

        $query = "UPDATE hasil_lomba SET member_id='$member_id', turnamen_id='$turnamen_id', mendali_id='$mendali_id' where hasil_id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

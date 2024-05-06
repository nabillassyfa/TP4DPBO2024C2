<?php

// Saya Nabilla Assyfa Ramadhani [2205297] 
// mengerjakan TP4
// dalam mata Desain dan Pemograman Berorientasi Objek 
// untuk keberkahanNya maka saya tidak melakukan kecurangan 
// seperti yang telah dispesifikasikan. 
// Aamiin

include_once("models/DB.class.php");

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members JOIN cabang ON members.cabang_id=cabang.cabang_id";
        return $this->execute($query);
    }

    function getMembersById($id)
    {
        $query = "SELECT * FROM members JOIN cabang ON members.cabang_id=cabang.cabang_id WHERE id='$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $cabang_id = $data['cabang_id'];

        $query = " INSERT INTO `members`(`name`, `email`, `phone`, `join_date`, `cabang_id`) VALUES ( '$name', '$email', '$phone', '$join_date', '$cabang_id' )";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE from `members` where id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function updateMembers($id, $data)
    {

        $name=$data["name"];
        $email=$data["email"];
        $phone=$data["phone"];
        $join_date = $data['join_date'];
        $cabang_id = $data['cabang_id'];

        $query = "UPDATE members SET name='$name', email='$email', phone='$phone', join_date='$join_date', cabang_id='$cabang_id' where id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

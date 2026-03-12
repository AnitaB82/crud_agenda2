<?php

require_once __DIR__ . '/Database.php';

class Contact {

    private $pdo;

    public function __construct(){
        $this->pdo = db();
    }

    public function getAll(){
        $stmt = $this->pdo->query("SELECT * FROM contacts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){

        $stmt = $this->pdo->prepare(
            "SELECT * FROM contacts WHERE id=?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name,$email,$phone){

        $sql = "INSERT INTO contacts(name,email,phone)
                VALUES(?,?,?)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$name,$email,$phone]);
    }

    public function update($id,$name,$email,$phone){

        $sql = "UPDATE contacts
                SET name=?, email=?, phone=?
                WHERE id=?";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$name,$email,$phone,$id]);
    }

    public function delete($id){

        $stmt = $this->pdo->prepare(
            "DELETE FROM contacts WHERE id=?"
        );

        return $stmt->execute([$id]);
    }

}
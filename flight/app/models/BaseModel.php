<?php
namespace app\models;
use PDO;
class BaseModel
{
    protected $db; 
   

    public function __construct($db)
    {
        $this->db = $db;
    }

    
    public function selectAll($columns ,$table)
    {
        $sql = "SELECT $columns FROM {$table}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   
    public function getById($id,$table)
    {
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data,$table)
    {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_map(fn($key) => ":$key", array_keys($data)));
        $sql = "INSERT INTO {$table} ($columns) VALUES ($placeholders)";

        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public function update($criteria, $data,$table)
    {
        $updates = implode(',', array_map(fn($key) => "$key = :$key", array_keys($data)));
        $conditions = implode(' AND ', array_map(fn($cle) => "$cle = :$cle", array_keys($criteria)));
        $sql = "UPDATE {$table} SET $updates WHERE $conditions";

        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        foreach ($criteria as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        

        return $stmt->execute();
    }

  
    public function delete($id,$table)
    {
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function findBy($criteria ,$table)
    {
        $conditions = implode(' AND ', array_map(fn($key) => "$key = :$key", array_keys($criteria)));
        $sql = "SELECT * FROM {$table} WHERE $conditions";

        $stmt = $this->db->prepare($sql);
        foreach ($criteria as $key => $value) {
             $value = $value."";
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCadeauIdsByUserAndAffectation($idUser, $idAffectation)
    {
        return $this->findBy(['id_user' => $idUser, 'id_affectation' => $idAffectation], 'Noel_Affectation');
    }

 
    public function getCadeauxByIds($cadeauIds)
    {
        $placeholders = implode(',', array_fill(0, count($cadeauIds), '?'));
        $sql = "SELECT * FROM Noel_Cadeau WHERE id_cadeau IN ($placeholders)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($cadeauIds);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}


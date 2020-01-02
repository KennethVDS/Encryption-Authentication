<?php
include "./lib/key.php";

class MusicModel{
    protected $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getAllMusic()
    {
        $link = $this->db->openDbConnection();
        $key = $_POST["key"];
        $result = $link->query("SELECT id, CAST(AES_DECRYPT(name,'$key') AS CHAR(50)) AS name_decrypt , track, album, released  FROM music");
        $music = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $music[] = $row;
        }
        $this->db->closeDbConnection($link);
        
		return $music;
    }

    public function getMusicById($id)
    {
        $link = $this->db->openDbConnection();
        $key = $_POST["key"];
        $query = "SELECT *,CAST(AES_DECRYPT(name,'$key') AS CHAR(50)) AS name_decrypt FROM music WHERE  id=:id";
        $statement = $link->prepare($query);
        //$statement->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $this->db->closeDbConnection($link);

        return $row;
    }
	
    public function insert()
    {
        $link = $this->db->openDbConnection();
        $key = $_POST["key"];
        $query = "INSERT INTO music (name, track, album, released) VALUES (AES_ENCRYPT(:name, '".$key."'), :track, :album, :released)";
        $statement = $link->prepare($query);
        $statement->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $statement->bindValue(':track', $_POST['track'], PDO::PARAM_STR);
        $statement->bindValue(':album', $_POST['album'], PDO::PARAM_STR);
        $statement->bindValue(':released', $_POST['released'], PDO::PARAM_STR);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }
    
    public function update($id)
    {
        $link = $this->db->openDbConnection();
        $key = $_POST["key"];
        $query = "UPDATE music SET name = AES_ENCRYPT(:name, '".$key."'), track = :track, album = :album, released = :released WHERE id = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $statement->bindValue(':track', $_POST['track'], PDO::PARAM_STR);
        $statement->bindValue(':album', $_POST['album'], PDO::PARAM_STR);
        $statement->bindValue(':released', $_POST['released'], PDO::PARAM_STR);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }

    public function delete($id)
    {
        $link = $this->db->openDbConnection();

        $query = "DELETE FROM music WHERE id = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }
    
    public function searchArtist($search)
    {
        $input = implode("|",$search);
        $link = $this->db->openDbConnection();
        $key = $_POST["key"];
        $query = "SELECT id,CAST(AES_DECRYPT(name,'$key') AS CHAR(50)) AS name_decrypt, track, album, released FROM music WHERE CAST(AES_DECRYPT(name,'$key') AS CHAR(50)) LIKE ? ORDER BY id DESC";
        $param = "%$input%";
        $statement = $link->prepare($query);;
        $statement->execute([$param]);
        $music = array();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->db->closeDbConnection($link);
        
		return $row;
    }
}
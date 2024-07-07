<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $name;
    public $email;
    public $pass;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT id, name, email FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function auth() {
        $query = "SELECT id, email FROM " . $this->table_name." WHERE name=:name AND pass='5fsefq11wert'";
        print_r($query);
        $stmt = $this->conn->prepare($query);
        print_r($stmt);
        $stmt->execute();
        echo "7777777";
        print_r($stmt);
        return $stmt;
    }
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, pass=:pass, email=:email";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->pass = htmlspecialchars(strip_tags($this->pass));
        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":pass", $this->pass);
        $stmt->bindParam(":email", $this->email);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET pass = :pass, email = :email WHERE name = :name";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->pass = htmlspecialchars(strip_tags($this->pass));
        $this->email = htmlspecialchars(strip_tags($this->email));
        //$this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':pass', $this->pass);
        $stmt->bindParam(':email', $this->email);
        //$stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE name = ?";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->name));
        $stmt->bindParam(1, $this->name);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>

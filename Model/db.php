<?php
class Database {
    private $host = "localhost";
    private $db_name = "your_database";
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }

    // Create
    public function insert($table, $data) {
        $fields = implode(',', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    // Read
    public function select($table, $where = '', $params = []) {
        $sql = "SELECT * FROM $table";
        if ($where) $sql .= " WHERE $where";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update
    public function update($table, $data, $where, $params = []) {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= "$key = :$key, ";
        }
        $fields = rtrim($fields, ', ');
        $sql = "UPDATE $table SET $fields WHERE $where";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(array_merge($data, $params));
    }

    // Delete
    public function delete($table, $where, $params = []) {
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }
}

// Usage example:
// $db = new Database();
// $conn = $db->connect();
// $db->insert('users', ['name' => 'John', 'email' => 'john@example.com']);
// $users = $db->select('users');
// $db->update('users', ['name' => 'Jane'], 'id = :id', ['id' => 1]);
// $db->delete('users', 'id = :id', ['id' => 1]);
?>
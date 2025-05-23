<?php
class Database {
    private $host = "localhost";
    private $db_name = "web-tech-project-db";
    private $username = "root";
    private $password = "";
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect(): PDO {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
            return $this->conn;
        } catch(PDOException $e) {
            throw new RuntimeException("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection(): PDO {
        return $this->conn;
    }

    public function insert(string $table, array $data): bool {
        $fields = implode(',', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($data);
        } catch(PDOException $e) {
            throw new RuntimeException("Insert failed: " . $e->getMessage());
        }
    }

    public function select(string $table, array $conditions = [], string $where = ''): array {
        $sql = "SELECT * FROM $table";
        $params = [];
        
        if (!empty($conditions)) {
            $whereParts = [];
            foreach ($conditions as $key => $value) {
                $whereParts[] = "$key = :$key";
                $params[":$key"] = $value;
            }
            $sql .= " WHERE " . implode(' AND ', $whereParts);
        } elseif ($where) {
            $sql .= " WHERE $where";
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            throw new RuntimeException("Select failed: " . $e->getMessage());
        }
    }

    public function update(string $table, array $data, array $conditions): bool {
        $setParts = [];
        foreach ($data as $key => $value) {
            $setParts[] = "$key = :set_$key";
        }
        
        $whereParts = [];
        $params = [];
        foreach ($conditions as $key => $value) {
            $whereParts[] = "$key = :cond_$key";
            $params[":cond_$key"] = $value;
        }
        
        foreach ($data as $key => $value) {
            $params[":set_$key"] = $value;
        }

        $sql = "UPDATE $table SET " . implode(', ', $setParts) . 
               " WHERE " . implode(' AND ', $whereParts);

        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($params);
        } catch(PDOException $e) {
            throw new RuntimeException("Update failed: " . $e->getMessage());
        }
    }

    public function delete(string $table, array $conditions): bool {
        $whereParts = [];
        $params = [];
        
        foreach ($conditions as $key => $value) {
            $whereParts[] = "$key = :$key";
            $params[":$key"] = $value;
        }

        $sql = "DELETE FROM $table WHERE " . implode(' AND ', $whereParts);

        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($params);
        } catch(PDOException $e) {
            throw new RuntimeException("Delete failed: " . $e->getMessage());
        }
    }
}
?>
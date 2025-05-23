<?php
require_once 'db.php';

class UserModel {
    private $db;

    public function __construct(Database $database) {
        $this->db = $database;
    }

    public function authenticate(string $email, string $password): ?array {
        $user = $this->getUserByEmail($email);
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return null;
    }

    public function createUser(array $userData): bool {
        $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);
        
        $data = [
            'first_name' => $userData['first_name'],
            'last_name' => $userData['last_name'],
            'email' => $userData['email'],
            'password' => $hashedPassword,
            'address' => $userData['address'] ?? null,
        ];

        return $this->db->insert('login_data', $data);
    }

    public function updatePassword(string $email, string $newPassword): bool {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        return $this->db->update(
            'login_data',
            ['password' => $hashedPassword],
            ['email' => $email]
        );
    }

    public function getUserByEmail(string $email): ?array {
        $result = $this->db->select('login_data', ['email' => $email]);
        return $result[0] ?? null;
    }

    public function emailExists(string $email): bool {
        return $this->getUserByEmail($email) !== null;
    }
}
?>
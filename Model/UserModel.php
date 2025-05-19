<?php
class UserModel {
    // In a real application, these would interact with a database
    private $users = [];

    public function authenticate($email, $password) {
        // This is just for demonstration
        // In a real app, you would verify against database records
        return !empty($email) && !empty($password);
    }

    public function createUser($data) {
        // This is just for demonstration
        // In a real app, you would insert into database
        if (!empty($data['email']) && !empty($data['password'])) {
            $this->users[$data['email']] = $data;
            return true;
        }
        return false;
    }
}
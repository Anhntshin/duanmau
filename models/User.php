<?php
class User extends BaseModel{
    protected $table = 'users';

    // Lay user theo email
    public function getByEmail($email){
        $sql = "SELECT * FROM {$this->table} WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    // Them user moi (dang ky)
    public function create($data){
        $sql = "INSERT INTO {$this->table} (name, email, password)
                VALUES (:name, :email, :password)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }
}
?>
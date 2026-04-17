<?php
class Category extends BaseModel{
    protected $table = 'categorys';
    // Lay tat ca danh muc
    public function getAll(){
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    // Lay danh muc theo id
    public function getById($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    // Xoa danh muc theo id
    public function delete($id){
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
    // Them danh muc moi
    public function create($data){
        $sql = "INSERT INTO {$this->table} (name) VALUES (:name)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'name' => $data['name']
        ]);
    }
    // Cap nhat danh muc
    public function update($data){
        $sql = "UPDATE {$this->table} SET name = :name WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $data['id'],
            'name' => $data['name']
        ]);
    }
}
?>
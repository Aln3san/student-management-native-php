<?php

class Student
{
    private $connection;
    private $table = 'students';

    // Properties
    public $id;
    public $name;
    public $email;
    public $progress;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function create()
    {
        // Query
        $query = "INSERT INTO " . $this->table . "(name, email, progress) Values (:name, :email, :progress)";
        // Prepare Query
        $stmt = $this->connection->prepare($query);
        // Clean Data (Security)
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        // Connect Data (Binding)
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':progress', $this->progress);
        // Implementation
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read()
    {
        // Get students
        $query = 'Select id, name, email, progress From ' . $this->table . ' Order By id Desc';
        // Prepare Query
        $stmt = $this->connection->prepare($query);
        // Implementation
        $stmt->execute();

        return $stmt;
    }

    public function read_single()
    {
        $query = "SELECT id, name, email, progress FROM " . $this->table . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Full Class Properties
        if ($row) {
            $this->name = $row['name'];
            $this->email = $row['email'];
            $this->progress = $row['progress'];
        }
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->connection->prepare($query);

        // Clean Data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind ID
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update()
    {
        $query = "UPDATE " . $this->table . " 
              SET name = :name, 
                  email = :email, 
                  progress = :progress 
              WHERE id = :id";

        $stmt = $this->connection->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':progress', $this->progress);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

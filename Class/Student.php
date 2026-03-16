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

    // Method to count total students for pagination calculations
    public function countAll($search = null)
    {
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table;

        // Add search condition if search term exists
        if ($search) {
            $query .= " WHERE name LIKE :search OR email LIKE :search";
        }

        $stmt = $this->connection->prepare($query);

        // Bind search parameter if it exists
        if ($search) {
            $searchTerm = "%{$search}%";
            $stmt->bindParam(':search', $searchTerm);
        }

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }

    public function read($from_record_num = null, $records_per_page = null, $search = null)
    {
        $query = "SELECT * FROM " . $this->table;

        // Add search condition if search term exists
        if ($search) {
            $query .= " WHERE name LIKE :search OR email LIKE :search";
        }

        $query .= " ORDER BY id DESC";

        // Add pagination limit if parameters are provided
        if ($from_record_num !== null && $records_per_page !== null) {
            $query .= " LIMIT :from, :records";
        }

        $stmt = $this->connection->prepare($query);

        // Bind search parameter
        if ($search) {
            $searchTerm = "%{$search}%";
            $stmt->bindParam(':search', $searchTerm);
        }

        // Bind pagination parameters with Integer type casting
        if ($from_record_num !== null && $records_per_page !== null) {
            $stmt->bindParam(':from', $from_record_num, PDO::PARAM_INT);
            $stmt->bindParam(':records', $records_per_page, PDO::PARAM_INT);
        }

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

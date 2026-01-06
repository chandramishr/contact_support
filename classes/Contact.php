<?php
class Contact
{
    private $conn;
    private $table = "contact_support";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function save($data)
    {
        $sql = "INSERT INTO {$this->table}
                (full_name, email, mobile_no, message, image)
                VALUES (:name, :email, :mobile, :message, :image)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':name'    => $data['full_name'],
            ':email'   => $data['email'],
            ':mobile'  => $data['mobile_no'],
            ':message' => $data['message'],
            ':image'   => $data['image'],
        ]);
    }
}

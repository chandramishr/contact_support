<?php
class Auth
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
        session_start();
    }

    public function login($username, $password)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM admin_users WHERE username = :username"
        );
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['admin_logged_in'] = true;
            return true;
        }
        return false;
    }

    public function logout()
    {
        session_destroy();
        header("Location: login.php");
        exit;
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['admin_logged_in']);
    }
}

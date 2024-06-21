<?php
class Database
{
    private static $instance = null;
    private $connection;

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "cinemax";

    private function __construct()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone() {}

    // Ensure unserialize returns the singleton instance
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->connection->prepare($sql);

        if (!$stmt) {
            return false; // Failed to prepare statement
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params)); // Assume all parameters are strings
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();

        return $result;
    }

    public function close()
    {
        $this->connection->close();
    }

    public function __destruct()
    {
        $this->close();
    }
}
?>

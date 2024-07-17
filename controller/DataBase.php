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
            error_log("Failed to prepare statement: " . $this->connection->error);
            return false; // Failed to prepare statement
        }
    
        if (!empty($params)) {
            $types = str_repeat('s', count($params)); // Assume all parameters are strings
            if (!$stmt->bind_param($types, ...$params)) {
                error_log("Failed to bind parameters: " . $stmt->error);
                return false; // Failed to bind parameters
            }
        }
    
        if (!$stmt->execute()) {
            error_log("Failed to execute statement: " . $stmt->error);
            return false; // Execution failed
        }
    
        $result = $stmt->get_result();
    
        if ($result === false) {
            // If the result is false, it means the query was not a SELECT
            // Check if it's an INSERT, UPDATE, or DELETE
            if ($stmt->affected_rows > 0) {
                $stmt->close();
                return true; // For non-SELECT queries, return true if rows were affected
            } else {
                $stmt->close();
                return false; // No rows affected, return false
            }
        }
    
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

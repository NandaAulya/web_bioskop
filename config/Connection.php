<?php
class Connection {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_error) {
            die("<h1>Koneksi Gagal</h1>");  
        }
    }

    public function getMysqliConnection() {
        return $this->conn;
    }
}
?>

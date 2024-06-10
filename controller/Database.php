<?php
class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "cinemax";

    public function connect()
    {
        $koneksi = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $koneksi;
    }

    public function __construct()
    {
        $this->connect();
    }

    public function __destruct()
    {
        $this->close();
    }

    public function close()
    {
        mysqli_close($this->connect());
    }

    public function query($sql, $params = [])
    {
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            return false; // Gagal persiapkan statement
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params)); // Semua parameter dianggap sebagai string
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $this->close();

        return $result;
    }
}

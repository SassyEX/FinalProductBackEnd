<?php
class connection {
    public $cn;

    function __construct($database) {
        // Database credentials
        $host = 'localhost';
        $username = 'root';
        $password = '';
        
        try {
            // Establishing the connection
            $this->cn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            // Set the PDO error mode to exception
            $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Log the error message
            error_log('Connection error: ' . $e->getMessage());
        }
    }

    public function CloseConnection() {
        // Closing the connection
        $this->cn = null;
    }
}
?>

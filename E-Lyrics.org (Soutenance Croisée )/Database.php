<?php

class Database {
    public static function connect() {
        try {
            $dsn = "mysql:host=localhost;dbname=E-Lyrics";
            $pdo = new PDO($dsn, "root", "");
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            return $pdo; 
        } catch (PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());    
        }
    }
}

?>


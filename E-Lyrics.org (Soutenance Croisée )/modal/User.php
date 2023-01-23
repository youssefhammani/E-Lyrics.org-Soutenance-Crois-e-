<?php

class User {
    public static function getUserData($email)
    {
        echo "test";
        $sql = "SELECT * FROM users WHERE email =:emailAddress";
        $stmt = Database::connect()->prepare($sql);
        $stmt->execute([":emailAddress" => $email]);
        $rows = $stmt->fetch();

        return $rows;
    }
}

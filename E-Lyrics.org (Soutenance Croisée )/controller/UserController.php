<?php

class UserController {
    public function VerifyUserInfo()
    {
            
        $data = User::getUserData($_POST['email']);

        if ($data['password'] == $_POST['pwd'])
        {
            header('location: dashboard.php');
        }
        else
        {
            // header(('location: dashboard.php'));
            echo 'Eroor';
        }
    }
}
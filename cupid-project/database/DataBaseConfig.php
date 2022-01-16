<?php

class DataBaseConfig
{
    public $servername;
    public $username;
    public $password;
    public $databasename;

    public function __construct()
    {
        $this->servername = 'localhost';
        $this->username = 'cupidUser';
        $this->password = 'CupidProjectAdminPass123';
        $this->databasename = 'cupid';
    }
}

?>

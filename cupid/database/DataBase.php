<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function logIn($table, $username, $password)
    {
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $this->sql = "select * from " . $table . " where login = '" . $username . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) != 0) {
            $dbusername = $row['login'];
            $dbpassword = $row['password'];

            if ($dbusername == $username && password_verify($password, $dbpassword)) {
                $login = true;
            } else $login = false;
        } else $login = false;

        return $login;
    }

    function signUp($table, $email, $username, $password)
    {
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $email = $this->prepareData($email);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->sql =
            "INSERT INTO " . $table . " (login, password, email) VALUES ('" . $username . "','" . $password . "','" . $email . "')";

        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function joinEvent($table, $name, $password)
    {
        $name = $this->prepareData($name);
        $password = $this->prepareData($password);
        $this->sql = "select * from " . $table . " where name = '" . $name . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) != 0) {
            $dbusername = $row['name'];
            $dbpassword = $row['password'];

            if ($dbusername == $name && password_verify($password, $dbpassword)) {
                $join = true;
            } else $join = false;
        } else $join = false;

        return $join;
    }

    function createEvent($table, $name, $password)
    {
        $name = $this->prepareData($name);
        $password = $this->prepareData($password);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->sql =
            "INSERT INTO " . $table . " (name, password) VALUES ('" . $name . "','" . $password . "')";

        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function insert($table, $name)
    {
        $name = $this->prepareData($name);
        $this->sql =
            "INSERT INTO " . $table . " (name) VALUES ('" . $name . "')";

        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function insertUserPhoto($table, $user, $photo, $event)
    {
        $idUser = $this->prepareData($user);
        $idPhoto = $this->prepareData($photo);
        $idEvent = $this->prepareData($event);
        $this->sql =
            "INSERT INTO " . $table . " (id_u, id_p, id_e) VALUES ('" . $idUser . "', '" . $idPhoto . "', '" . $idEvent . "')";

        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function getUserID($table, $name)
    {
        $name = $this->prepareData($name);
        $this->sql =
            "SELECT id_u FROM " . $table . " WHERE login = " . $name;

        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function getEventID($table, $name)
    {
        $name = $this->prepareData($name);
        $this->sql =
            "SELECT id_u FROM " . $table . " WHERE name = " . $name;

        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }
}

?>

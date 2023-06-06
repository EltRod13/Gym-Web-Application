<?php

include_once 'database_helper.php';

    class User
{
    // sql table with user's profile info
    private $userTable;
    private $dbConnection;

    public function __construct($connection, $username)
    {
        $this->dbConnection = $connection;
        $query = prepareAndExecuteQuery($connection, "SELECT * FROM members WHERE memberUsername= ? ", 's', [$username]);
        $this->userTable = mysqli_fetch_array($query);
    }

    public function getUsername()
    {
        return $this->userTable['memberUsername'];
    }

    public function getFirstAndLastName()
    {
        return $this->userTable['memberName'];
    }

    public function getEmail()
    {
        return strtolower($this->userTable['memberEmailId']);
    }

    public function getId()
    {
        return $this->userTable['MemberId'];
    }

}

?>
<?php

namespace Acme;

class Database {

    private $servername;
    private $username;
    private $password;
    private $dbname;

    /**
     * Database constructor.
     * @param $servername
     * @param $username
     * @param $password
     * @param $dbname
     */
    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    /**
     * @param $values array
     */
    public function save($values)
    {
        $conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);

        $sql = "INSERT INTO site_info (url, total_visits)
                              VALUES ('$values[0]', '$values[1]' )";

        if ($values[1]!=null) {
            $conn->query($sql);
            echo "Total visits amount added successfully into a DB";
        } else {
            echo "Can't get total visits amount";
        }

        $conn->close();
    }
}
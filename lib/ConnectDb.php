<?php

class ConnectDb extends Singleton {
    protected $connection;

    function __construct()
    {
        $this->open_connection();
    }

    private function open_connection(){
        try{
            $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        } catch (Exception $ex ){
            echo $ex->getMessage();
        }
    }

    public function close_connection(){
        if(isset($this->connection)){
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }

    public function create($sql, $params = [], $bind = ''){

        $conn = $this->connection->prepare($sql);

        $conn->bind_param($bind,$params[0],$params[1],$params[2]);

        return $conn->execute();
    }

    public function select($sql){
        $conn = $this->connection->query($sql);

        if( $conn->num_rows > 0 ) {
            while ( $row = mysqli_fetch_all($conn)) {
                return $row;
            }
        }

        return false;

    }

    public function select_by_id($sql,$id)
    {
        $query = $this->connection->query($sql."'{$id}'");

        return $query;
    }

    public function update($sql,$params = [], $bind = '')
    {
        $conn = $this->connection->prepare($sql);

        $conn->bind_param($bind,$params[0],$params[1],$params[2]);

        return $conn->execute();
    }

    public function delate($sql,$id)
    {
        $conn = $this->connection->query($sql."'{$id}'");

        return $conn;
    }
}


$db = ConnectDb::getInstance();

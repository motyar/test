<?php

class db
{
    public $host;
    public $db_name;
    public $username;
    public $password;
    public $res;
    public $query;

    public function __construct($host, $db_name, $username, $password)
    {
        $this->host =     $host;
        $this->password = $password;
        $this->username = $username;
        $this->db_name = $db_name;
    }


    public function connect()
    {
        $this->res = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        if (! $this->res) {
            die($this->debug('connect'));
        }
    }

    public function rowcount($query)
    {
        $this->query = $query;
        $result = mysqli_query($this->res, $query) or die($this->debug('query'));
        return mysqli_num_rows($result);
    }

    public function debug($type)
    {
        switch ($type) {
        case 'connect':
            $message = 'MySQL Error Occured';
            $result = mysqli_errno() . ': ' . mysqli_connect_error($this->res);
            $output = 'Could not connect to the database. Be sure to check that your database connection settings are correct and that the MySQL server in running.';
            break;

        case 'database':

            $message = 'MySQL Error Occurred';
            $result =  mysqli_errno($this->res) . ': ' .  mysqli_error($this->res);
            $output = 'Sorry an error has occured accessing the database. Be sure to check that your database connection settings are correct and that the MySQL server in running.';

        case 'query':


            $message = 'MySQL Error Occurred';
            $result =  mysqli_errno($this->res) . ': ' .  mysqli_error($this->res);
            $query = $this->query;
        }


        return $result.$query;
    }



    public function Q($query)
    {
        $type = strtolower(explode(' ', trim($query))[0]);

        $this->query = $query;
        if ($type=='select') {
            $result = mysqli_query($this->res, $query) or die($this->debug('query'));
            if (mysqli_num_rows($result) > 0) {
                while ($record = mysqli_fetch_array($result)) {
                    $data[] = $record;
                }
                return $data;
            }
        } elseif ($type=='insert') {
            $result = mysqli_query($this->res, $query) or die($this->debug('query'));
            //echo '<pre>';
            //print_r($result);
            return mysqli_insert_id($this->res);
        } elseif ($type=='update') {
            $result = mysqli_query($this->res, $query) or die($this->debug('query'));
            return $result;
        } elseif ($type == 'delete') {
            $result = mysqli_query($this->res, $query) or die($this->debug('query'));
            return $result;
        }
        return false;
    }
}

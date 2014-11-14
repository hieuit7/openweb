<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */

class Db
{
    private $db;
    private $driver;
    public function __construct($registry)
    {
        include_once 'MySql.class.php';
        $db = $registry->get('db');
        $this->driver = new MySql($db);
        $this->db = $this->driver->getLink();
    }
    public function query($sql)
    {
        $result = $this->driver->query($sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    
    public function insert($tbl, $field, $value)
    {
        $sql = "INSERT INTO " . $tbl;
        $fields = "";
        if (is_array($field) && is_array($value))
        {
            if (count($field) == 0)
            {

            } else
            {
                $sql .= "(" . $field[0];

                for ($i = 1; $i < count($field); $i++)
                {

                    $sql .= "," . $field[$i];
                }
                $sql .= ")";
            }
            $sql .= " VALUES('" . $value[0];
            for ($i = 1; $i < count($value); $i++)
            {
                $sql .= "','" . $value[$i];
            }
            $sql .= "')";
        }
        
        $result = $this->driver->query($sql);
        return $result;
    }
}

?>
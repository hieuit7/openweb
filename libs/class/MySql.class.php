<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */

class MySql
{
    private $link;
    public function __construct($db)
    {
        $this->link = mysql_connect($db['host'],$db['user'],$db['passwd']);
        if(!mysql_select_db($db['db']))
        {
            trigger_error("Can't connect to $db[db]");
        }
    }
    
    public function getLink()
    {
        return $this->link;
    }
    
    public function query($sql)
    {
        $result = mysql_query($sql,$this->link);
        if($result)
        {
            if(is_resource($result))
            {
                $data = array();
                $i = 0;
                
                while($row = mysql_fetch_array($result))
                {
                    $data[$i] = $row;
                    $i++;
                }
                mysql_free_result($result);
                
                $resulted = new stdClass();
                $resulted->num_rows = $i;
                $resulted->data = $data;
                unset($data);
                return $resulted;
            }
            else
            {
                return true;   
            }
        }
        else
        {
            trigger_error("Can't query with $sql".mysql_errno($this->link)." ".mysql_error($this->link));
        }
          
    }
}

?>
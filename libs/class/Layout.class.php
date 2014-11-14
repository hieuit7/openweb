<?php

/**
 * @author hieu nguyen
 * @copyright 2013
 */

class Layout{
    private $layout;
    public function __construct($registry){
        $this->layout = array();
        $config = $registry->get('db');
        $sql = "SELECT * FROM rs_sys_layout WHERE isuse = 1";
        $db = new Db($registry);
        $result = $db->query($sql);
        $i = 0;
        $data = $result->data;
        // x? l? cho 
        foreach($data as $value)
        {
            $this->layout[$i] = $value['path'];
            $this->layout['name'.$i] = $value['name'];
            $this->layout['pos'.$i] = $value['pos'];
            $i++; 
        }        
    }
    
    private function sort(){
        for($i = 0; $i < (count($this->layout)/3); $i++){
            for($j = $i; $j< (count($this->layout)/3)-1;$j++ ){
                if($this->layout['pos'.$i] > $this->layout['pos'.$j]){
                    $path = $this->layout[$i];
                    $name = $this->layout['name'.$i];
                    $pos = $this->layout['pos'.$i];
                    $this->layout[$i] = $this->layout[$j];
                    $this->layout['name'.$i] = $this->layout['name'.$j];
                    $this->layout['pos'.$i] = $this->layout['pos'.$j];
                    $this->layout[$j] = $path;
                    $this->layout['name'.$j] = $name;
                    $this->layout['pos'.$j] = $pos; 
                }
            }
        }
    }
    public function getLayout()
    {
        $this->sort();
        return $this->layout;
    }
}

?>
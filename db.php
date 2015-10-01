<?php
//Database Class
class Db {
    // make sure we dont connnect database to every function
    public $mysql;
    function __construct(){
        $this->mysql = new mysqli('localhost','root','','aishik') or die ("Error");
    }
};
?>
<?php

class DB
{
    static public function query($sql)
    {
        //Connect to the database
        $mysqli = new mysqli('localhost', 'root', '1234', 'blog');
       
        //if there is an error connecting, log that
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
      
        //run the query
        $result = $mysqli->query($sql);
       
        if ($result) {
            //a placeholder for the rows of the query
            $rows = [];
   
            //create the rows array 
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            
            return $rows;
        } else {
            die(sprintf('Problem with the following sql:<br />%s', $sql));
        }
    }
    
    static public function insert($sql) {
        //Connect to the database
        $mysqli = new mysqli('localhost', 'root', '1234', 'blog');
    
        //if there is an error connecting, log that
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
    
        //run the query
        return $mysqli->query($sql);
    }
}

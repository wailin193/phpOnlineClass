<?php
    function insertItem($n,$d,$p,$img)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbforexercise";
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "insert into items(iname,idescription,iprice,iimage)
             values('$n','$d',$p,'$img')";

             $conn->exec($sql);

             $id= $conn->lastInsertId();
            $conn=null;

            return $id;
            
        }catch(PDOException $e){
            $conn->rollback();
            echo "Exception: ".$e->getMessage();
        }
    }
?>
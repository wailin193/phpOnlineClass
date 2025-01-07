<?php
    class DBHandler{
        private static $servername = "localhost";
        private static $username = "root";
        private static $password = "";
        private static $dbname = "dbforexercise";
        private static $conn;

        public static function openConnection()
        {
            try{
                DBHandler::$conn = new PDO("mysql:host=".self::$servername.";dbname=".self::$dbname,DBHandler::$username,DBHandler::$password);
                DBHandler::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return true;
            }catch(PDOException $e){
                echo "Exception: ".$e->getMessage();
                return false;
            }
        }

        public static function insertItem($n,$d,$p,$img)
        {
            
            try{
                DBHandler::openConnection();
                $sql = "insert into items(iname,idescription,iprice,iimage)
                values('$n','$d',$p,'$img')";

                DBHandler::$conn->exec($sql);

                $id= DBHandler::$conn->lastInsertId();
                DBHandler::$conn=null;

                return $id;
                
            }catch(PDOException $e){
                echo "Exception: ".$e->getMessage();
            }
        }

        public static function getAllItems()
        {
            
            try{
                DBHandler::openConnection();
                $sql = "select * from items order by iname";

                $st = DBHandler::$conn->query($sql);
;
                $ans = $st->fetchAll(\PDO::FETCH_ASSOC);
                DBHandler::$conn=null;

                return $ans;
                
            }catch(PDOException $e){
                echo "Exception: ".$e->getMessage();
            }
        }

        public static function deleteItem($iid)
        {
            
            try{
                DBHandler::openConnection();
                $sql = "delete from items where iid=$iid";
                $stmt = DBHandler::$conn->prepare($sql);

                $stmt->execute();

                $row = $stmt->rowCount();

                DBHandler::$conn=null;

                return $row>0;
                
            }catch(PDOException $e){
                echo "Exception: ".$e->getMessage();
            }
        }

        public static function updateItem($iid,$iname,$ides,$iprice,$iimg)
        {
            
            try{
                DBHandler::openConnection();
                $sql = "update items set iname='$iname',iprice=".$iprice.", idescription='$ides',iimage='$iimg' where iid=$iid";
                $stmt = DBHandler::$conn->prepare($sql);

                $stmt->execute();

                $row = $stmt->rowCount();

                DBHandler::$conn=null;

                return $row;
                
            }catch(PDOException $e){
                echo "Exception: ".$e->getMessage();
            }
        }

        public static function updateItemNoImage($iid,$iname,$ides,$iprice)
        {
            
            try{
                DBHandler::openConnection();
                $sql = "update items set iname='$iname',iprice=".$iprice.", idescription='$ides' where iid=$iid";
                $stmt = DBHandler::$conn->prepare($sql);

                $stmt->execute();

                $row = $stmt->rowCount();

                DBHandler::$conn=null;

                return $row;
                
            }catch(PDOException $e){
                echo "Exception: ".$e->getMessage();
            }
        }
    }
?>
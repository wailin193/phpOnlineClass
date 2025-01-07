<?php
    class DBHandler {        
        private static $conn;

        public static function openConnection() {
            try {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "dbforexercise";
                DBHandler::$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                DBHandler::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return true;
            } catch(PDOException $e) {
                echo "Expection: " . $e->getMessage();
                return false;
            } 
        }

        public static function insertItem($n, $d, $p, $img) {            
            try {
                DBHandler::openConnection();
                
                $sql = "insert into items(iname, idescription, iprice, iimage) values ('$n', '$d', '$p', '$img')";
                DBHandler::$conn->exec($sql);
    
                $id = DBHandler::$conn->lastInsertId();
                
                DBHandler::$conn = null;
                return $id;
    
            } catch(PDOException $e) {
                echo "Expection: " . $e->getMessage();
            }
        }

        public static function deleteItem($iid) {            
            try {
                DBHandler::openConnection();
                
                $sql = "delete from items where iid=$iid";
                $stmt = DBHandler::$conn->prepare($sql);
                $stmt->execute();
                $row = $stmt->rowCount();
                
                DBHandler::$conn = null;
                return $row>0;
    
            } catch(PDOException $e) {
                echo "Expection: " . $e->getMessage();
            }
        }

        public static function updateItem($iid, $iname, $iprice, $iimg, $ides) {            
            try {
                DBHandler::openConnection();
                
                $sql = "update items set iname='$iname',iprice='$iprice',iimage='$iimg',idescription='$ides' where iid=$iid";
                $stmt = DBHandler::$conn->prepare($sql);

                $stmt->execute();

                $row = $stmt->rowCount();

                DBHandler::$conn = null;

                return $row;
    
            } catch(PDOException $e) {
                echo "Expection: " . $e->getMessage();
            }
        }

        public static function updateItemNoImage($iid, $iname, $iprice, $ides) {            
            try {
                DBHandler::openConnection();
                
                $sql = "update items set iname='$iname',iprice='$iprice',idescription='$ides' where iid=$iid";
                $stmt = DBHandler::$conn->prepare($sql);

                $stmt->execute();

                $row = $stmt->rowCount();

                DBHandler::$conn = null;

                return $row;
    
            } catch(PDOException $e) {
                echo "Expection: " . $e->getMessage();
            }
        }

        public static function getAllItems() {            
            try {
                DBHandler::openConnection();
                
                $sql = "select * from items order by iname";
                $st = DBHandler::$conn->query($sql);

                $ans = $st->fetchAll(\PDO::FETCH_ASSOC);
                
                DBHandler::$conn = null;
                return $ans;
    
            } catch(PDOException $e) {
                echo "Expection: " . $e->getMessage();
            }
        }

        public static function insertCustomer($name, $phone, $address, $remark) {
            try {
                DBHandler::openConnection();
                $sql = "insert into customers(cName, cPhone, cAddress, cRemark) values ('$name', '$phone', '$address', '$remark')";
                DBHandler::$conn->exec($sql);

                $cid = DBHandler::$conn->lastInsertId();
                DBHandler::$conn = null;

                return $cid;
            } catch(PDOException $e) {
                // DBHandler::$conn->rollBack();
                echo "Exception: ".$e->getMessage();
            }
        }

        public static function insertOrder($cid) {
            try {
                DBHandler::openConnection();
                $sql = "insert into orders(cid) values ('$cid')";
                DBHandler::$conn->exec($sql);

                $oid = DBHandler::$conn->lastInsertId();
                DBHandler::$conn = null;

                return $oid;
            } catch(PDOException $e) {
                // DBHandler::$conn->rollBack();
                echo "Exception: ".$e->getMessage();
            }
        }

        public static function insertOrderItem($oid, $iid, $qty) {
            try {
                DBHandler::openConnection();
                $sql = "insert into orderitems(oid, iid, qty) values ($oid, $iid, $qty)";
                DBHandler::$conn->exec($sql);

                $oiid = DBHandler::$conn->lastInsertId();
                DBHandler::$conn = null;

                return $oiid;
            } catch(PDOException $e) {
                // DBHandler::$conn->rollBack();
                echo "Exception: ".$e->getMessage();
            }
        }

    }

    // echo DBHandler::insertCustomer("Aye", "09123456789", "MDY", "Friday Only");
    // $oid = DBHandler::insertOrder($cid);
    // $oiid = DBHandler::insertOrderItem($oid, 5, 3);
?>
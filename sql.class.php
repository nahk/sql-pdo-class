<?php
class MySQL extends PDO {

    private static $host = 'localhost', // Database host        (default: localhost)
    private static $port = '3306',      // Database port        (default: 3306)
    private static $base = 'database',  // Database name
    private static $user = 'user',      // Database username    (default: root)
    private static $pass = 'password',  // Database password

    private static $charset = 'utf8',   // Database charset

    public function __construct() {

        try {
            
            $options = self::$charset ? array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.self::$charset) : null;

            parent::__construct(
                'mysql:host='.self::$host';'.
                'port='.self::$port.';'.
                'dbname='.self::$base,
                self::$user,
                self::$pass,
                $options
            );
            // parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(Exception $e) {

            echo 'Erreur : '.$e->getMessage().'<br />';
            echo 'N° : '.$e->getCode();
            // die();

        }
    }
    
    public function executeQuery($query, $data = array()) {
        $stmt = parent::prepare($query);
        
        try {
            $stmt->execute($data);
            return $stmt;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function insert($query, $data = array()) {
        return $this->executeQuery($query, $array) ? ( parent::lastInsertId() ? parent::lastInsertId() : true ) : false;
    }

    public function select($query, $data = array()) {
        return $this->executeQuery($query, $data);
    }
    
    public function update($query, $data = array()) {
        return $this->executeQuery($query, $data);
    }

    public function delete($query, $data = array()) {
        return $this->executeQuery($query, $data);
    }
    
}

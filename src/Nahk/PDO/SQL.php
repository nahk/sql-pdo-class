<?php

namespace Nahk\PDO;

use \PDO;
use \PDOException;

class SQL extends PDO 
{

    const STATEMENT_CLASS = 'Nahk\PDO\Statement';

    private $host, $port, $base, $user, $pass, $charset;

    protected function connect()
    {
        try {
            parent::__construct(
                'mysql:host='.$this->host.';'.
                'port='.$this->port.';'.
                'dbname='.$this->base,
                $this->user,
                $this->pass,
                array(
                    PDO::ATTR_STATEMENT_CLASS    => array($this::STATEMENT_CLASS),
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => sprintf('SET NAMES `%s`', $this->charset),
                )
            );
        } catch(Exception $e) {
            echo 'Erreur : '.$e->getMessage().'<br />';
            echo 'N° : '.$e->getCode();
            // die();
        }
    }

    public function __construct(
        $host='localhost', $base='database', $user='user', $pass='', $port=3306, $charset='utf8'
    ) 
    {
        $this->host    = $host;
        $this->base    = $base;
        $this->user    = $user;
        $this->pass    = $pass;
        $this->port    = $port;
        $this->charset = $charset;
        
        $this->connect();
    }
    
    public function executeQuery($query, $data = array())
    {
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
    
    public function insert($query, $data = array())
    {
        return $this->executeQuery($query, $array) ? ( parent::lastInsertId() ? parent::lastInsertId() : true ) : false;
    }

    public function select($query, $data = array())
    {
        return $this->executeQuery($query, $data);
    }
    
    public function update($query, $data = array())
    {
        return $this->executeQuery($query, $data);
    }

    public function delete($query, $data = array())
    {
        return $this->executeQuery($query, $data);
    }
    
}

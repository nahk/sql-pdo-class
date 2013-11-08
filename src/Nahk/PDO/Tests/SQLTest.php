<?php

namespace Nahk\PDO\Tests;

use \PHPUnit_Framework_TestCase;
use \Exception;
use Nahk\PDO\SQL;

class SQLTest extends PHPUnit_Framework_TestCase
{

    public function testSimpleRequest()
    {
        $conn = new SQL(
            $GLOBALS['DB_HOST'], $GLOBALS['DB_BASE'],
            $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']
        );
        $res = $conn->executeQuery(
            "SELECT 1+1"
        );
        $this->assertEquals($res->fetchColumn(), 1+1);
    }

    public function testCharset()
    {
        $conn = new SQL(
            $GLOBALS['DB_HOST'], $GLOBALS['DB_BASE'],
            $GLOBALS['DB_USER'], $GLOBALS['DB_PASS'],
            $GLOBALS['DB_PORT'], $GLOBALS['DB_CSET']
        );
        $res = $conn->executeQuery(
            "SHOW VARIABLES LIKE 'character_set_connection'"
        );
        $this->assertEquals($res->fetchColumn(1), $GLOBALS['DB_CSET']);
    }

}
<?php
namespace BadTodoSample;

class MyPDO extends \PDO
{
	public $dbname;
    public function __construct()
    {
        $config = \BadTodoSample\Config::get('database');

        $dsn = $config['driver'] .
        ':host=' . $config['hostname'] .
        ((!empty($config['port'])) ? (';port=' . $config['port']) : '') .
        ';dbname=' . $config['dbname'];

        $this->dbname = $config['dbname'];
       
        parent::__construct($dsn, $config['username'], $config['password']);
    }
}
?>
<?php
namespace BadTodoSample;

class MyPDO extends \PDO
{
	public $dbname;
    public function __construct($file = '../config/db_settings.ini')
    {
        if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');
       
        $dsn = $settings['database']['driver'] .
        ':host=' . $settings['database']['host'] .
        ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
        ';dbname=' . $settings['database']['schema'];

        $this->dbname = $settings['database']['schema'];
       
        parent::__construct($dsn, $settings['database']['username'], $settings['database']['password']);
    }
}
?>
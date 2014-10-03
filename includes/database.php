<?php

class Database {
	protected $db_user = 'aurora';
	protected $db_pass = '3123sdg3242rf';
	protected $db_host = '127.0.0.1';
	protected $db_database = 'aurora';
	

	protected $sql_qry_get_user_password ="select * from users where username =  ";

    protected function singlereturn_porta($sql_qry,$value) {
  		$link = mysql_connect($this->host_porta, $this->username_porta, $this->password_porta);
        if (!$link) {
        	die('Could not connect: ' . mysql_error());
        }
        mysql_select_db($this->database_porta);
        $sql = $sql_qry;
        $result = mysql_query($sql);
        while ($row = mysql_fetch_assoc($result)) {
        	$dd = $row[$value];
        }
        return $dd;

	}


	public function getpass($username) {
    	$password = $this->singlereturn($this->sql_qry_get_user_password.'\''.$username.'\'','password');
    	return $password;
	}


}

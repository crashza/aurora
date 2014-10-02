<?php
class AUTH {
    protected $salt = "uP43C48hFq";
    public function login() { 
		if(isset($_COOKIE['ID_my_site'])){
	       	 	$username = $_COOKIE['ID_my_site'];
	        	$pass = $_COOKIE['Key_my_site'];
			$pass = stripslashes($pass);
			$db = new DB;
	        	$password = $db->getpass($username);
			if ( $pass == $password ) {
				return $username;
			}
			else {
			header("Location: login.php");
			} 	
		
		
		}
		else { 
			header("Location: login.php"); 
		}
	}

	public function firstlogin($username,$pass) {
		$db = new DB;
		$pass = stripslashes($pass);
		$pass = $this->salt.$pass;
		$pass = md5($pass);
	        $password = $db->getpass($username);
		if ( $pass == $password ) {
			$username = stripslashes($username);			 
			$hour = time() + 36000;
			setcookie(ID_my_site, $username, $hour);
 			setcookie(Key_my_site, $pass, $hour);
			header("Location: newconfig.php");	
		}

	}
	
	public function logout() {
			$past = time() - 100; 
			setcookie(ID_my_site, gone, $past); 
			setcookie(Key_my_site, gone, $past); 
			header("Location: login.php"); 
	}

                public function checkadmin($username) {
		        $db = new DB;
		        $access = $db->access($username); 
               		if ( $access == 1 ) { 
			//Admin has logged in
                                }
			else {
			header("Location: accessdenied.php");
			}


			

                }



}

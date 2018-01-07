<?php

include 'db.php';
//namespace phpUnit\Test;
 
$email = $mysqli->escape_string('mreouven@gmail.com');
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
$user = $result->fetch_assoc(); 
$email = $user['email'];
$hash = $user['hash'];
$first_name = $user['first_name'];
$last_name = $user['last_name'];

echo $user;

class ForgotTest extends \PHPUnit_Framework_TestCase
{
	public function testuser()
		{
			$foo = isset($user);
			$this->assertTrue(!$foo);
		}
	public function testmail()
		{
		    $foo1 = isset($email);
		    $this->assertTrue(!$foo1);
		}
	public function testhash()
		{
			$foo2 = isset($hash);
			$this->assertTrue(!$foo2);
		}
    public function testfirst_name()
    	{
    		$foo3 = isset($first_name);
    		$this->assertTrue(!$foo3);
    	}
    public function testlast_name()
    	{
    		$foo4 = isset($last_name);
    		$this->assertTrue(!$foo4);
    	}
}
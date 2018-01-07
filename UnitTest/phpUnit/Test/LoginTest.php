<?php

//namespace phpUnit\Test;
include 'sessioncharge.php';

class LoginTest extends \PHPUnit_Framework_TestCase
{	
	
	public function Testmail()
		{
			$_SESSION['email'] = $user['email'];
			$this->assertEquals($_SESSION['email'],$user['email']);
		}
	
	
	public function TestFirstName()
		{
		 	$_SESSION['first_name'] = $user['first_name'];
			 $this->assertEquals( $_SESSION['first_name'],$user['first_name']);
		}
	
	
	public function TestLastName()
		{
		 	$_SESSION['last_name'] = $user['last_name'];
		 	$this->assertEquals(  $_SESSION['last_name'], $user['last_name']);
		}
	
	public function TestLActive()
		{
			 $_SESSION['active'] = $user['active'];
			 $this->assertEquals(   $_SESSION['active'],$user['active']);
		}
		
	
	
	public function TestAdmin()
		{
			$_SESSION['admin'] = $user['admin'];
			$this->assertEquals(  $_SESSION['admin'],$user['admin']);
		}

	
	public function TestLogged_in()
		{
			$_SESSION['logged_in'] = true;
			$this->assertTrue( $_SESSION['logged_in']);
		}
	
	
				
		
	
	
    //
}

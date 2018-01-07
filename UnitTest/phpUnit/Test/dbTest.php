<?php

namespace phpUnit\Test;

class DbTest extends \PHPUnit_Framework_TestCase
{
	public function testhost()
		{
			$foo = $host;
		    $this->assertEquals($foo,'mreouven.y.me:3307');
		}
	public function testuser()
		{
			$foo2 = $user;
		    $this->assertEquals($foo2,'root');
		}
	public function testpass()
		{
			$foo3 = $pass;
		    $this->assertEquals($foo3,'reen');
		}
	public function testdb()
		{
			$foo4 = $db;
			$this->assertEquals($foo4,'ts');
		}	
		
    //
}
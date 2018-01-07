<?php

namespace phpUnit\Test;

class DbTest extends \PHPUnit_Framework_TestCase
{
	public function testhost()
		{
			$foo = $host;
		    $this->assertEquals($foo,'mreouven.synology.me:3307');
		}
	public function testuser()
		{
			$foo2 = $user;
		    $this->assertEquals($foo2,'root');
		}
	public function testpass()
		{
			$foo3 = $pass;
		    $this->assertEquals($foo3,'reouven');
		}
	public function testdb()
		{
			$foo4 = $db;
			$this->assertEquals($foo4,'accounts');
		}	
		
    //
}
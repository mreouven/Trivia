<?php

namespace phpUnit\Test;

class DbTest extends \PHPUnit_Framework_TestCase
{
	public function testhost()
		{
		    $this->assertTrue(!isset($host));
		}
	public function testuser()
		{
		
		    $this->assertTrue(!isset($user));
		}
	public function testpass()
		{
			$this->assertTrue(!isset($pass));
		}
	public function testdb()
		{
		
			$this->assertTrue(!isset($db));
		}	
		
    public function testConnection()
		{
		
			$this->assertTrue(!isset($mysqli));
		}
}
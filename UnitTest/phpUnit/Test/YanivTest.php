<?php

namespace phpUnit\Test;

class RegisterTest extends \PHPUnit_Framework_TestCase
{
	public function testTrueIsTrue()
		{
		    $foo = true;
		    $this->assertTrue($foo);
		}


		public function testEmail()
		{
		    $_SESSION['email'] = $user['email'];
		    $this->assertEquals($_SESSION['email'], $user['email']);
		}
    //
}
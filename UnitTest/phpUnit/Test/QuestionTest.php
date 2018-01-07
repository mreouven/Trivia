<?php
session_start();
include 'sessioncharge.php';
//namespace phpUnit\Test;
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];
  $active = $_SESSION['active'];
$level_user = $_SESSION['level_user'];

class QuestionTest extends \PHPUnit_Framework_TestCase
{
	public function testFnameIsEquals()
		{
		    $first_name = $_SESSION['first_name'];
		    $this->assertEquals( $first_name, $_SESSION['first_name']);
		}
	public function testLnameIsEquals()
		{
		    $last_name = $_SESSION['last_name'];
		    $this->assertEquals( $last_name, $_SESSION['last_name']);
		}
	public function testEmailIsEquals()
		{
		    $email = $_SESSION['email'];
		    $this->assertEquals( $email, $_SESSION['email']);
		}
	public function testActiveIsEquals()
		{
		    $active = $_SESSION['active'];
		    $this->assertEquals( $active, $_SESSION['active']);
		}
	public function testLevelUserIsEquals()
		{
		    $level_user = $_SESSION['level_user'];
		    $this->assertEquals( $level_user, $_SESSION['level_user']);
		}

	public function testDonneesIsEquals()
		{
			$this->assertTrue(!isset($user));
		}

    //
}
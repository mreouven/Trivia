<?php
declare(strict_types=1);



use PHPUnit\Framework\TestCase;

require 'email.php';


final class EmailTest extends TestCase
{
    public function testCanBeCreatedFromValidEmailAddress()
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress()
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString()
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }


}
?>

<?php
namespace Acme\DemoBundle\Tests\Controller;
use Test\WebTestCase;
class ContactControllerTest extends WebTestCase
{
  public function testContact() {
    $client = static::createClient();
    $router = $client->getContainer()->get('router');
    $em = $client->getContainer()->get('doctrine');
    // Find any
    $person = $em->getRepository('AcmeDemoBundle:Person')->findOneBy(array());
    $crawler = $client->request('GET', $router->generate('person_show', array('id' => $person->getId())));
    $this->assertEquals(200, $client->getResponse()->getStatusCode());
    // Generate fake message, but unique to find it.
    $msg = '== Test ' . uniqid() . ' ==';
    // Find form in page
    $form = $crawler->filter('#sidebar form')->form(array(
      'contact[name]' => 'test',
      'contact[email]' => 'test@example.com',
      'contact[message]' => $msg,
    ));
    $client->submit($form);
    // Form redirectes
    $this->assertEquals(302, $client->getResponse()->getStatusCode());
    $profile = $client->getProfile();
    $collector = $profile->getCollector('swiftmailer');
    $email = $person->getEmail();
    $found = false;
    foreach ($collector->getMessages() as $message) {
        // Checking the recipient email and the X-Swift-To
        // header to handle the RedirectingPlugin.
        // If the recipient is not the expected one, check
        // the next mail.
        $correctRecipient = array_key_exists(
            $email, $message->getTo()
        );
        $headers = $message->getHeaders();
        $correctXToHeader = false;
        if ($headers->has('X-Swift-To')) {
            $correctXToHeader = array_key_exists($email,
                $headers->get('X-Swift-To')->getFieldBodyModel()
            );
        }
        if (!$correctRecipient && !$correctXToHeader) {
            continue;
        }
        if (strpos($message->getBody(), $msg) !== false) {
          $found = true;
          break;
        }
    }
    $this->assertTrue($found, 'Email was not sent to ' . $person->getEmail());
  }
}
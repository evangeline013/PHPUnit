<?php
/**
 * Created by PhpStorm.
 * User: Evangeline
 * Date: 3/12/19
 * Time: 4:26 PM
 */

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function setUp() {
        $this->user = new \App\Models\User;
    }

    public function test_we_can_get_first_name() {
        $this->user->setFirstName('Billy');

        $this->assertEquals('Billy', $this->user->getFirstName());
    }

    public function test_we_can_get_last_name() {
        $this->user->setLastName('Garrett');

        $this->assertEquals('Garrett', $this->user->getLastName());
    }

    public function test_full_name_is_returned() {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Garrett');

        $this->assertEquals('Billy Garrett', $this->user->getFullName());

    }

    public function test_first_and_last_name_are_trimmed() {
        $this->user->setFirstName('  Billy    ');
        $this->user->setLastName('       Garrett ');

        $this->assertEquals('Billy', $this->user->getFirstName());
        $this->assertEquals('Garrett', $this->user->getLastName());
    }

    public function test_we_can_get_email() {
        $this->user->setEmail('billy@gmail.com');

        $this->assertEquals('billy@gmail.com', $this->user->getEmail());
    }

    public function test_email_variables_contains_correct_values() {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Garrett');
        $this->user->setEmail('billy@gmail.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);
        $this->assertEquals('Billy Garrett', $emailVariables['full_name']);
        $this->assertEquals('billy@gmail.com', $emailVariables['email']);
    }
}
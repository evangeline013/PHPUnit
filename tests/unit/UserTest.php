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
    public function testWeCanGetTheFIrstName() {
        $user = new \App\Models\User;
        $user->setFirstName('Billy');

        $this->assertEquals('Billy', $user->getFirstName());
    }

    public function testWeCanGetTheLastName() {
        $user = new \App\Models\User;
        $user->setLastName('Garrett');

        $this->assertEquals('Garrett', $user->getLastName());
    }

    public function testFullNameIsReturned() {
        $user = new \App\Models\User;
        $user->setFirstName('Billy');
        $user->setLastName('Garrett');

        $this->assertEquals('Billy Garrett', $user->getFullName());

    }

    public function testFirstAndLastNameAreTrimmed() {
        $user = new \App\Models\User;
        $user->setFirstName('  Billy    ');
        $user->setLastName('       Garrett ');

        $this->assertEquals('Billy', $user->getFirstName());
        $this->assertEquals('Garrett', $user->getLastName());
    }

    public function testEmailAddressCanBeSet() {
        $user = new \App\Models\User;
        $user->setEmail('billy@gmail.com');

        $this->assertEquals('billy@gmail.com', $user->getEmail());
    }

    public function testEmailVariableContainCorrectValues() {
        $user = new \App\Models\User;
        $user->setFirstName('Billy');
        $user->setLastName('Garrett');
        $user->setEmail('billy@gmail.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);
        $this->assertEquals('Billy Garrett', $emailVariables['full_name']);
        $this->assertEquals('billy@gmail.com', $emailVariables['email']);
    }
}
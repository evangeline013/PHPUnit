<?php
/**
 * Created by PhpStorm.
 * User: Evangeline
 * Date: 3/12/19
 * Time: 8:24 PM
 */

namespace App\Models;


class User
{
    public $first_name;

    public $last_name;

    public $email;

    public function setFirstName($firstName) {
        $this->first_name = trim($firstName);
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function setLastName($lastName) {
        $this->last_name = trim($lastName);
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getFullName() {
        return "$this->first_name $this->last_name";
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getEmailVariables() {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail()
        ];
    }
}
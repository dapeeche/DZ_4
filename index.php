<?php
class UserException extends Exception {}

class User {

    private $name;
    private $age;
    private $email;

    public function __call($prop, $arguments)
    {
        if (!property_exists($this, $prop)) {
            throw new UserException("Method $prop not found");
        }
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    // метод setEmail ми не створюємо
    //public function setEmail($email) {
    //    $this->email = $email;
    //}

    public function getAll() {
        return "Name - " . $this->name . ", Age - " . $this->age . ", Email -" . $this->email;
    }
}

try {
    $user = new User();
    $user->setName('Vlad Kuts');
    $user->setAge(22);
    $user->setEmail('dapeeche@ukr.net');

} catch (UserException $e) {
    echo 'Exception: ' . $e->getMessage() . PHP_EOL;
}

echo $user->getAll();
<?php

 namespace App;

class RandomUserCreater{

    private $names;
    private $surnames;
    private $emails;
    private $passwords;
    private $users;

    public function __construct($names , $surnames , $emails , $passwords)
    {
        $this->names = $names;
        $this->surnames = $surnames;
        $this->emails = $emails;
        $this->passwords = $passwords;
        $this->users = [];
        $this->createRandomUsers();
    }

    public function createRandomUsers() {
        $users = [];
        for($i = 0 ; $i< 20 ; $i++){
            $name = $this->names[array_rand($this->names)];
            $surname = $this->surnames[array_rand($this->surnames)];
            $email = $this->emails[array_rand($this->emails)];
            $password = $this->passwords[array_rand($this->passwords)];
            $user = new User($name,$surname,$email,$password) ;
            array_push($users,$user);
        }
        $this->users = $users;
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }


}
<?php

namespace App;


use PragmaRX\Random\Random;

class RandomDataGenerator
{
    private $emails = [];
    private $passwords = [];
    private $random ;

    public function __construct()
    {
        $this->random = new Random();
    }

    public function generateRandomEmails(){

        $emails = [];
        for ($i = 0; $i < 20 ; $i++){
            $email = $this->random->size(6)->get() . "@gmail.com";
            array_push($emails,$email);
        }
        $this->emails = $emails;
        return $this->emails;
    }

    public function generateRandomPasswords(){
        $passwords = [];
        for ($i = 0; $i < 20 ; $i++){
            $password = md5($this->random->size(5)->get());
            array_push($passwords,$password);
        }
        $this->passwords = $passwords;
        return $this->passwords;
    }



}
<?php

namespace App\Contracts;

use Mail;
use App\Mail\Contact;
use App\User;
class SaveEmailTwo{
    public function save($request){
      return  Mail::to("test2@gmail.com")->send(new Contact($request));
    }
}

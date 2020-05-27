<?php

namespace App\Contracts;

use Mail;
use App\Mail\Contact;
use App\User;
class SaveEmailOne{
    public function save($request){
      return Mail::to("test@gmail.com")->send(new Contact($request));
    }
}

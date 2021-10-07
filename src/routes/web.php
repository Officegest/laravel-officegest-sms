<?php

use Illuminate\Support\Facades\Route;
use OfficegestSms\Classes\OfficegestSms;

public function dummyfunction(){
    $sender = new OfficegestSms();
    $sender->send('+351.123456789', 'Your text message');
}

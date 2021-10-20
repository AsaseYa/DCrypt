<?php

use Src\Models\ShiftEncryption;


$model = new ShiftEncryption("je");

var_dump($model->encryptInput());
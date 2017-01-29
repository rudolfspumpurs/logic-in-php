<?php

include 'vendor/autoload.php';

ORM::configure('mysql:host=localhost;dbname=logic_in_php');
ORM::configure('username', 'root');
ORM::configure('password', '');

ORM::for_table('complicated_table')->find_array();

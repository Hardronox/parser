<?php

require "vendor/autoload.php";

use Acme\Parser;
use Acme\Database;

$parser= new Parser('https://www.similarweb.com/website/google.com');
$values=$parser->getSiteUrlAndValue();
//s

$db= new Database('localhost', 'root', '123456', 'parser');
$db->save($values);

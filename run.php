<?php

declare(strict_types=1);

use Phpbergen\Sqlite;
use Phpbergen\Member;

/**
 * Setup app.
 */
const APP_HOME = __DIR__;
const SQLITE = APP_HOME . '/db/phpbergen.sq3';
require_once __DIR__ . '/vendor/autoload.php';
$database = new Sqlite();
$database->init();

// Do something useful.
$member = new Member();
$member->createMember('Stein', 'Magne', 'Bjørklund', 'steinmb@proton.me');
echo $member->newestMember() . PHP_EOL;

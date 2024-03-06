<?php

declare(strict_types=1);

namespace Phpbergen;

/**
 * Setup app.
 */
const APP_HOME = __DIR__;
const SQLITE = APP_HOME . '/db/phpbergen.sq3';
require_once __DIR__ . '/vendor/autoload.php';
$database = new Sqlite();
$database->init();

// Do something useful.
$email = Email::fromString('steinmb@phpberge.no');
$person = new Name('Stein', 'Magne', 'Bjørklund');
$member = new Member();
$member->createMember($person, $email);
echo $member->newestMember() . PHP_EOL;

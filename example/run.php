<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

use EscalationClient\EscalationClient;

$messages = [
    'message' => 'Teste de mensagem 1',
    'pause' => 5
];
//$messages = [
//    [
//        'message' => 'Teste de mensagem 1',
//        'pause' => 5
//    ],
//    [
//        'message' => 'Teste de mensagem 2',
//    ],
//    [
//        'message' => 'Teste de mensagem 3',
//        'language' => 'pt-BR'
//    ],
//];

$escalation = new EscalationClient($_ENV['TWILIO_USER_SID'], $_ENV['TWILIO_USER_TOKEN'], $_ENV['TWILIO_DEV_NUMBER']);

$escalation->runEscalation($messages, [], []);
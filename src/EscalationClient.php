<?php

// EscalationClient version 0.1
// Copyright 2023 Igor Guimarães

namespace EscalationClient;

use Twilio\Rest\Client as TwilioClient;
use Twilio\TwiML\VoiceResponse;
use Twilio\Exceptions\TwilioException;
use EscalationClient\Escalation\EscalationValidator;
use EscalationClient\Options\OptionsValidator;
use EscalationClient\Message\MessageValidator;

class EscalationClient
{

    private TwilioClient $client;
    private $twilio_number;

    public function __construct(String $twilio_sid, String $twilio_token, String $twilio_number)
    {
        $this->twilio_number = $twilio_number;
        $this->client = new TwilioClient($twilio_sid, $twilio_token);
    }

    public function runEscalation(Array $twilio_messages, Array $twilio_options, Array $numbers_escalation)
    {

        if(empty($twilio_messages)) return json_encode(['status' => false, 'data' => 'Messages empty, please set standard messages and opts!']);
//        if(empty($twilio_options)) return json_encode(['status' => false, 'data' => 'Options empty, please set standard Options!']);
//        if(empty($numbers_escalation)) return json_encode(['status' => false, 'data' => 'Numbers Escalation empty, please set escalation flow!']);

        $messages = MessageValidator::validateMessages($twilio_messages);

        print_r(is_object($messages));

    }

}
<?php

namespace EscalationClient\Message;

class MessageValidator
{

    const STANDARD_LANG = 'en';
    const STANDARD_PAUSE = 1;
    private $_message;
    private $_language;
    private $_pause;
    private $_messagens;

    private function __construct()
    {
        $this->_message = null;
        $this->_pause = self::STANDARD_PAUSE;
        $this->_language = self::STANDARD_LANG;
    }

    public function getMessage()
    {
        return $this->_message;
    }

    public function getPause()
    {
        return $this->_pause;
    }

    public function getLanguage()
    {
        return $this->_language;
    }

    public static function validateMessages(array $message)
    {
        $msg = new MessageValidator();

        foreach ($message as $key => $value) {
            if (is_array($value)) $msg->_messagens[] = MessageValidator::validateMessages($value);
            elseif ($key === 'message') $msg->_message  = $value;
            elseif ($key === 'pause') $msg->_pause  = $value;
            elseif ($key === 'language') $msg->_language  = $value;
        }

        return !empty($msg->_messagens) ? $msg->_messagens : $msg;
    }

}
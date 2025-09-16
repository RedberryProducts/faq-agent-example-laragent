<?php

namespace App\Enums;

enum RuleViolation: string
{
    case NoViolence = 'violence';
    case NoBadWords = 'bad-words';
    case NoOffTopic = 'off-topic';
    case NoIllegalContent = 'illegal-or-inappropriate';
    case RespectfulInteraction = 'disrespect';
    case None = 'none';
}

<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;


#[AsTwigComponent('notify')]
class NotifyComponent
{
    public string $result;
}

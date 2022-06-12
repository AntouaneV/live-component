<?php

namespace App\Components;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('add_cart')]
final class ProductAddToCart extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public bool $isSaved = false;

    #[LiveAction]
    public function save()
    {
        $this->isSaved = true;
    }
}

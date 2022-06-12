<?php

namespace App\Components;

use App\Entity\Cart;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent('add_cart')]
final class ProductAddToCart extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public int $idBase;
    public bool $isSaved = false;

    #[LiveAction]
    public function save(ManagerRegistry $doctrine, #[LiveArg] int $id)
    {
        $entityManager = $doctrine->getManager();

        $product = $doctrine->getRepository(Product::class)->find($id);



        $cart = new Cart();

        $cart->setProductId($product);

        $entityManager->persist($cart);
        $entityManager->flush();

        $this->isSaved = true;
    }
}

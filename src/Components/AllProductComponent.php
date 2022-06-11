<?php

namespace App\Components;

use App\Repository\ProductRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('all_product')]
class AllProductComponent
{
    public function __construct(
        private ProductRepository $productRepository
    ) {
    }

    public function getAllProduct(): array
    {
        return $this->productRepository->findAll();
    }
}

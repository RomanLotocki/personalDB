<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('displayStars', [$this, 'displayStars'], ['is_safe' => ['html']]),
        ];
    }

    public function displayStars($rating)
    {
        $stars = '';

        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                $stars .= '<i class="fas fa-star" style="color: #f3c300;"></i>';
            } else {
                $stars .= '<i class="far fa-star"></i>';
            }
        }

        return $stars;
    }
}
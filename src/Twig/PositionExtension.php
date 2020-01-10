<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class PositionExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('position', [$this, 'formatPosition']),
        ];
    }

    public function formatPosition($position)
    {
        switch ($position) {
            case 1:
                return "Prestation";
                break;
            case 2:
                return "Journée bien-être";
                break;
            case 3:
                return "Contact";
                break;
        }
    }
}

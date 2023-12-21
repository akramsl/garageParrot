<?php

namespace App\Twig;

use App\Repository\OpeningTimeRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class OpeningTimeExtension extends AbstractExtension // Extension Twig pour l'extension personnalisé
{
    private $openingTimeRepository;

    public function __construct(OpeningTimeRepository $openingTimeRepository)
    {
        $this->openingTimeRepository = $openingTimeRepository;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('getOpeningTimes', [$this, 'getOpeningTimes']),
        ];
    }

    public function getOpeningTimes()
    {
        return $this->openingTimeRepository->findAll();
    }
}

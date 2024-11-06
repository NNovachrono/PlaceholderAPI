<?php

namespace Nozell\PlaceholderAPI;

use pocketmine\player\Player;

class PlaceholderProcessor
{

    private PlaceholderRegistry $registry;

    public function __construct(PlaceholderRegistry $registry)
    {
        $this->registry = $registry;
    }

    public function processText(string $text, ?Player $player = null): string
    {
        return $this->registry->parsePlaceholders($text, $player);
    }
}

<?php

namespace Nozell\PlaceholderAPI\placeholders;

use pocketmine\player\Player;

abstract class PlayerPlaceholder implements PlaceholderInterface
{

    public function process(?Player $player = null): string
    {
        if ($player === null) {
            return "N/A";
        }
        return $this->processPlayer($player);
    }

    abstract protected function processPlayer(Player $player): string;
}

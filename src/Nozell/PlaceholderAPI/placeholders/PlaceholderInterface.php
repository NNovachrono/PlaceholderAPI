<?php

namespace Nozell\PlaceholderAPI\placeholders;

use pocketmine\player\Player;

interface PlaceholderInterface
{

    public function getIdentifier(): string;

    public function process(?Player $player = null): string;
}

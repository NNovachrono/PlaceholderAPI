<?php

namespace Nozell\PlaceholderAPI\placeholders;

use pocketmine\player\Player;

abstract class ServerPlaceholder implements PlaceholderInterface
{

    public function process(?Player $player = null): string
    {
        return $this->processServer();
    }

    abstract protected function processServer(): string;
}

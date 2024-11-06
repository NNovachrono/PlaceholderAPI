<?php

namespace Nozell\PlaceholderAPI;

use Nozell\PlaceholderAPI\placeholders\PlaceholderInterface;
use pocketmine\plugin\Plugin;
use pocketmine\player\Player;

class PlaceholderRegistry
{

    private array $placeholders = [];

    public function __construct(private Plugin $plugin) {}

    public function registerPlaceholder(PlaceholderInterface $placeholder): void
    {
        $this->placeholders[$placeholder->getIdentifier()] = $placeholder;
        $this->plugin->getLogger()->info("Placeholder registrado: {$placeholder->getIdentifier()}");
    }

    public function parsePlaceholders(string $text, ?Player $player = null): string
    {
        foreach ($this->placeholders as $identifier => $placeholder) {
            $value = $placeholder->process($player);
            $text = str_replace("{" . $identifier . "}", (string) $value, $text);
        }
        return $text;
    }
}

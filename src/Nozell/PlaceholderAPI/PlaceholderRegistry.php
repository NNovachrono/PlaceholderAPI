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

    public function filterTags(array $values, ?Player $player = null): array
    {
        return array_filter($values, function ($value) use ($player) {
            $originalLine = $value;

            $processedLine = $this->parsePlaceholders($value, $player);

            foreach ($this->placeholders as $identifier => $placeholder) {
                $value = $placeholder->process($player);

                if (empty(trim($value)) && strpos($originalLine, "{" . $identifier . "}") !== false) {
                    return false;
                }
            }

            return trim($processedLine) !== '';
        });
    }
}

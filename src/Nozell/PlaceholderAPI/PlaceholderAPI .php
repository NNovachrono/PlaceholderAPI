<?php

namespace Nozell\PlaceholderAPI;

use pocketmine\plugin\PluginBase;

class PlaceholderAPI extends PluginBase
{

    private static ?PlaceholderRegistry $registry = null;

    public static function getRegistry(): ?PlaceholderRegistry
    {
        return self::$registry;
    }

    public function onEnable(): void
    {
        self::$registry = new PlaceholderRegistry($this);
        $this->getLogger()->info("PlaceholderAPI ha sido habilitado y está listo para registrar placeholders.");
    }
}

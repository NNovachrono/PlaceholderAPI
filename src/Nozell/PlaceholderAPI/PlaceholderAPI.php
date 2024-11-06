<?php

namespace Nozell\PlaceholderAPI;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class PlaceholderAPI extends PluginBase
{

    private static ?PlaceholderRegistry $registry = null;

    public static function getRegistry(): ?PlaceholderRegistry
    {
        return self::$registry;
    }

    public function onEnable(): void
    {
        $startTime = microtime(true);
        self::$registry = new PlaceholderRegistry($this);
        $endTime = microtime(true);
        $executionTime = ($endTime - $startTime);

        if ($executionTime < 1) {
            $execution = $executionTime * 1_000;
            Server::getInstance()
                ->getLogger()
                ->info('PlaceholderAPI enabled in ' . round($execution, 2) . ' ms.');
        } else {
            Server::getInstance()
                ->getLogger()
                ->info('PlaceholderAPI enabled in ' . round($executionTime, 2) . ' s.');
        }
    }
}

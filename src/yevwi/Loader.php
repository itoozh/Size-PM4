<?php

namespace yevwi;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getLogger()->info("Size command Enabled!");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()) {
            case "size":
                if (!$sender instanceof Player) {
                    return false;
                }
                if (!is_numeric($args[0])) {
                    $sender->sendMessage(TextFormat::colorize('&cDebes ingresar un valor numerico!'));
                    return false;
                }
                if (count($args) < 1) {
                    $sender->sendMessage(TextFormat::colorize('&cUsa /size [int: scale]'));
                    return false;
                }
                if (!$sender->hasPermission("size.command")) {
                    return false;
                }
                $sender->setScale($args[0]);
        }
        return true;
    }
}

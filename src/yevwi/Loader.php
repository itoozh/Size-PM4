<?php

namespace yevwi;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase implements Listener {

    /**
     * @return void
     */
    public function onEnable(): void {
        $this->getLogger()->info("§aSizeCmd initialized");
    }

    /**
     * @param CommandSender $sender
     * @param Command $command
     * @param string $label
     * @param array $args
     * @return bool
     */
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        switch ($command->getName()) {
            case "size":
                if (!$sender instanceof Player) {
                    return false;
                }
                if (!is_numeric($args[0])) {
                    $sender->sendMessage("&cToo small size");
                    return false;
                }
                if (count($args) < 0) {
                    $sender->sendMessage("&cUse /size [size]");
                    return false;
                }
                if (!$sender->hasPermission("size.command")) {
                    return false;
                }
                if (count($args) > 30) {
                    $sender->sendMessage("§cToo large size");
                }
                $sender->setScale($args[0]);
        }
        return true;
    }
}

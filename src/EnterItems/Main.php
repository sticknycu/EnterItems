<?php
namespace EnterItems;

use pocketmine\event\HandlerList;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {

	public function onLoad(){
		$this->getLogger()->info(TextFormat::WHITE . "I've been loaded!");
	}
  
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(TextFormat::DARK_GREEN . "I've been enabled!");
	}
    
	public function onDisable(){
		$this->getLogger()->info(TextFormat::DARK_RED . "I've been disabled!");
	}
  
	public function onJoin(PlayerJoinEvent $e) {
		$e->getPlayer()->getInventory()->clearAll();
		$item1 = Item::fromString(378); // magma cream
		$item2 = Item::fromString(345); // compass
		$item3 = Item::fromString(46); // tnt
		$e->getPlayer()->getInventory()->addItem(clone $item1);
		$e->getPlayer()->getInventory()->addItem(clone $item2);
		$e->getPlayer()->getInventory()->addItem(clone $item3);
	}
}

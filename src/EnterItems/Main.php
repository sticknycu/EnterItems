<?php
namespace EnterItems;

use pocketmine\event\HandlerList;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

use pocketmine\event\player\PlayerItemHeldEvent;

use pocketmine\event\player\PlayerDropItemEvent;

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
		$e->getPlayer()->getInventory()->setHelmet(Item::get(397, 5, 1)); // dragon head
		$e->getPlayer()->getInventory()->setChestplate(Item::get(444, 0, 1)); // elytra
		$item2 = Item::fromString(422); // prismaryne cristal
		$e->getPlayer()->getInventory()->addItem(clone $item2);
	}
	
	public function onChangeArmour(PlayerItemHeldEvent $ev) {
		$ev->setCancelled(true);
	}
	
	public function onDropItem(PlayerDropItemEvent $event){
		$event->setCancelled(true);
}
}

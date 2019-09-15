<?php

namespace BlackDrop;

use pocketmine\Server;
use BlackDrop\Drop;
use pocketmine\event\Listener;
use pocketmine\block\Block;
use pocketmine\level\Level;
use pocketmine\tile\Chest;
use pocketmine\math\Vector3;
use pocketmine\entity\Entity;
use pocketmine\event\entity\EntityExplodeEvent;
use pocketmine\inventory\DoubleChestInventory;
use pocketmine\inventory\ChestInventory;

class Event implements Listener{
	
	public function __construct(Main $own){
		$this->own = $own;
	}
	
	public function onExplode(EntityExplodeEvent $event){
		foreach($event->getBlockList() as $block){
			if($block->getId() == 54){
				$chest = $block->level->getTile($block);
				if($chest instanceof Chest){
					$inventory = $chest->getInventory();
					if($inventory instanceof DoubleChestInventory) return;
					if($inventory instanceof ChestInventory){
						$drop = new Drop($inventory, new Vector3($block->x, $block->y, $block->z));
						$this->own->delayDrop($block->level, $drop);
					}
				}
			}
		}
	}
	
}
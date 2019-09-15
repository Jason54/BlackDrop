<?php

namespace BlackDrop;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\level\Level;
use BlackDrop\Event;
use BlackDrop\DelayDrop;
use BlackDrop\Drop;

class Main extends PluginBase{
	public function onEnable(){
		Server::getInstance()->getPluginManager()->registerEvents(new Event($this), $this);
	}
	public function delayDrop(Level $level, Drop $drop){
		Server::getInstance()->getScheduler()->scheduleDelayedTask(new DelayDrop($this, $level, $drop), 30);
	}
}
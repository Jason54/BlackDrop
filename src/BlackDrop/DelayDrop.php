<?php

namespace BlackDrop;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\level\Level;
use BlackDrop\Drop;
use BlackDrop\Main;
use pocketmine\math\Vector3;

class DelayDrop extends PluginTask{
	
	public function __construct(Main $own, Level $level, Drop $drop){
		parent::__construct($own);
		$this->own = $own;
		$this->level = $level;
		$this->drop = $drop;
	}
	
	public function onRun($tick){
		$this->drop->dropItems($this->level);
	}
}
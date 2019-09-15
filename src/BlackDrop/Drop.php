<?php

namespace BlackDrop;

use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\inventory\ChestInventory;

class Drop{
	
	private $inventory;
	private $vec;
	private $inside = [];
	
	public function __construct(ChestInventory $inventory, Vector3 $vec){
		$this->vec = $vec;
		$this->inventory = $inventory;
	}
	
	public function getPosition(){
		return $this->vec;
	}
	
	public function getInventory(){
		return $this->inventory;
	}
	
	public function setInventory(ChestInventory $inv){
		$this->inventory = $inv;
	}
	
	public function getInside(){
		foreach($this->inventory->getContents() as $item){
			$this->inside[] = $item;
		}
		return $this->inside;
	}
	
	public function dropItems(Level $level){
		foreach($this->getInside() as $item){
			$level->dropItem($this->vec, $item);
		}
	}
}
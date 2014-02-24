<?php
namespace Event\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Event\Entity\User;
use Event\Entity\Event;
use Event\Entity\InventoryLog;
use DateTime;

/** 
	* @ORM\Entity
	* @ORM\Table(name="inventory")	
*/
class Inventory {
    /**
	 * @ORM\Id
	 * @ORM\Column(type="integer", nullable=false)
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
    protected $id;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name = null;
	
	/**
	 * @ORM\ManyToOne(targetEntity="User")
	 * @ORM\JoinColumn(referencedColumnName="user_id")
	 */
	protected $user;
	
	/**
	 * @ORM\OneToMany(targetEntity="InventoryLog", mappedBy="inventory")
	 @ORM\JoinColumn(referencedColumnName="inventory_id")
	 */
	protected $inventorylog;
	
	/**
     * @ORM\Column(type="integer")
     */
    protected $stock = 0;
	
	
	public function getId(){
		return $this->id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setName($name){
		$this->name = $name;
	}
	
    public function getUser(){		
		return $this->user;
	}
	
	public function setUser(User $user){
		$this->user = $user;
	}
	
	public function getStock(){
		return $this->stock;		
	}
	
	public function setStock($stock){
		$this->stock = $stock;
	}
	
	public function getInventoryLog(){
		return $this->inventorylog;	
	}
	
	public function exchangeArray($data)
    {
		$this->user_id     = (isset($data['user_id'])) ? $data['user_id'] : 0;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->id  = (isset($data['id'])) ? $data['id'] : 0;
		$this->stock  = (isset($data['stock'])) ? $data['stock'] : 0;
    }
	
	public function getArrayCopy()
    {
        return get_object_vars($this);
    }
	
	public function __toString(){
		return (string) $this->name;	
	}
}
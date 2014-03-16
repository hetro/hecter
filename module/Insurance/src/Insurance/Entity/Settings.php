<?php
namespace Insurance\Entity;
use Doctrine\ORM\Mapping as ORM;

/** 
	* @ORM\Entity
	* @ORM\Table(name="settings")	
*/
class Settings {
    /**
	 * @ORM\Id
	 * @ORM\Column(type="integer", nullable=false)
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
    protected $id;
	
	
	/**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $str;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $value = 250;
	
	
	public function getId(){
		return $this->id;
	}

    public function getStr()
    {
        return $this->str;
    }
		
    public function setStr($str)
    {
        $this->str = $str;
    }

	public function getValue(){
		return $this->value;
	}
	
	public function setValue($value){
		$this->value = $value;
	}

	public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
<?php
namespace Insurance\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use DateTime;

/** 
	* @ORM\Entity
	* @ORM\Table(name="claimdisablement")	
*/
class ClaimDisablement {
    /**
	 * @ORM\Id
	 * @ORM\Column(type="integer", nullable=false)
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
    protected $id;
	
	/**
     * @ORM\ManyToOne(targetEntity="Insurance\Entity\Policy", inversedBy="claim", cascade={"all"})
     */
    protected $policy;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $loss;
	
	/**
     * @ORM\Column(type="decimal",scale=2)
     */
    protected $amount = '0.00';
	
	
	public function getId(){
		return $this->id;
	}

    public function getPolicy()
    {
        return $this->policy;
    }
		
    public function setPolicy(\Insurance\Entity\Policy $policy = null)
    {
        $this->policy = $policy;
    }

	
	public function getLoss(){
		return $this->loss;
	}
	
	public function setLoss($loss){
		$this->loss = $loss;
	}
	
	public function getAmount(){
		return $this->amount;
	}
	
	public function setAmount($amount){
		$this->amount = $amount;
	}
	
	public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
<?php
namespace Insurance\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use DateTime;

/** 
	* @ORM\Entity
	* @ORM\Table(name="claimbodilyinjuries")	
*/
class ClaimBodilyInjuries {
    /**
	 * @ORM\Id
	 * @ORM\Column(type="integer", nullable=false)
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
    protected $id;
	
	/**
     * @ORM\ManyToOne(targetEntity="Insurance\Entity\Policy", inversedBy="claimbodilyinjuries", cascade={"all"})
     */
    protected $policy;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $professional;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $servicesrendered = null;
	
	/**
     * @ORM\Column(type="decimal",scale=2)
     */
    protected $reimbursablefee = '0.00';
	
	
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

	public function getProfessional(){
		return $this->professional;
	}
	
	public function setProfessional($professional){
		$this->professional = $professional;
	}
	
	public function getServicesrendered(){
		return $this->servicesrendered;
	}
	
	public function setServicesrendered($servicesrendered){
		$this->servicesrendered = $servicesrendered;
	}
	
	public function getReimbursablefee(){
		return $this->reimbursablefee;
	}
	
	public function setReimbursablefee($reimbursablefee){
		$this->reimbursablefee = $reimbursablefee;
	}
	
	public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
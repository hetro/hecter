<?php
namespace Insurance\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Insurance\Entity\User;
use DateTime;

/** 
	* @ORM\Entity
	* @ORM\Table(name="policy")	
*/
class Policy {
    /**
	 * @ORM\Id
	 * @ORM\Column(type="integer", nullable=false)
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
    protected $id;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $no = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $isap = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $lto = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $policy = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $address = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $businessandprofession = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $certificateofcover = null;
	
	/**
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $dateissued;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $officialreceipt = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $model = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $make = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $typeofbody = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $color = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $bltfilenumber = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $platenumber = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $chassisnumber = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $motornumber = null;
	
	/**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $unladenweight = null;
	
	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $authorizedcapacity = null;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $datecreated;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $startofinsurance;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $endofinsurance;
	
	/**
	 * @ORM\Column(type="decimal",scale=2)
	 */
	protected $premiumpaid = 250.00;
	
	/**
	 * @ORM\Column(type="decimal",scale=2)
	 */
	protected $authenticationfee = 65.40;
	
	/**
	 * @ORM\Column(type="decimal",scale=2)
	 */
	protected $vat = '0.00';
	
	/**
	 * @ORM\Column(type="decimal",scale=2)
	 */
	protected $stamps = '0.00';
	
	/**
	 * @ORM\Column(type="decimal",scale=2)
	 */
	protected $lgt = '0.00';
	
	/**
	 * @ORM\Column(type="decimal",scale=2)
	 */
	protected $totalamountdue = '0.00';
	
	/**
     * @ORM\OneToMany(targetEntity="Insurance\Entity\ClaimBodilyInjuries", mappedBy="policy", cascade={"all"})
     */
    protected $claimbodilyinjuries;
	
	/**
     * @ORM\OneToMany(targetEntity="Insurance\Entity\ClaimDisablement", mappedBy="policy", cascade={"all"})
     */
    protected $claimdisablement;
	
	/**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $claimstatus = null;
	
	public function getId(){
		return $this->id;
	}
	
	public function getClaimstatus(){
		return $this->claimstatus;
	}
	
	public function setClaimstatus($claimstatus){
		$this->claimstatus = $claimstatus;
	}
	
	public function getPremiumpaid(){
		return $this->premiumpaid;
	}
	
	public function setPremiumpaid($premiumpaid){
		$this->premiumpaid = $premiumpaid;
	}
	
	public function getAuthenticationfee(){
		return $this->authenticationfee;
	}
	
	public function setAuthenticationfee($authenticationfee){
		$this->authenticationfee = $authenticationfee;
	}
	
	public function getVat(){
		return $this->vat;
	}
	
	public function setVat($vat){
		$this->vat = $vat;
	}
	
	public function getStamps(){
		return $this->stamps;
	}
	
	public function setStamps($stamps){
		$this->stamps = $stamps;
	}
	
	public function getLgt(){
		return $this->lgt;
	}
	
	public function setLgt($lgt){
		$this->lgt = $lgt;
	}
	
	public function getTotalamountdue(){
		return $this->totalamountdue;
	}
	
	public function setTotalamountdue($totalamountdue){
		$this->totalamountdue = $totalamountdue;
	}
	
	public function getAuthorizedcapacity(){
		return $this->authorizedcapacity;
	}
	
	public function setAuthorizedcapacity($authorizedcapacity){
		$this->authorizedcapacity = $authorizedcapacity;
	}
	
	public function getMotornumber(){
		return $this->motornumber;
	}
	
	public function setMotornumber($motornumber){
		$this->motornumber = $motornumber;
	}
	
	public function getChassisnumber(){
		return $this->chassisnumber;
	}
	
	public function setChassisnumber($chassisnumber){
		$this->chassisnumber = $chassisnumber;
	}
	
	public function getPlatenumber(){
		return $this->platenumber;
	}
	
	public function setPlatenumber($platenumber){
		$this->platenumber = $platenumber;
	}
	
	public function getBltfilenumber(){
		return $this->bltfilenumber;
	}
	
	public function setBltfilenumber($bltfilenumber){
		$this->bltfilenumber = $bltfilenumber;
	}
	
	public function getColor(){
		return $this->color;
	}
	
	public function setColor($color){
		$this->color = $color;
	}
	
	public function getTypeofbody(){
		return $this->typeofbody;
	}
	
	public function setTypeofbody($typeofbody){
		$this->typeofbody = $typeofbody;
	}
	
	public function getMake(){
		return $this->make;
	}
	
	public function setMake($make){
		$this->make = $make;
	}
	
	public function getModel(){
		return $this->model;
	}
	
	public function setModel($model){
		$this->model = $model;
	}
	
	public function getOfficialreceipt(){
		return $this->officialreceipt;
	}
	
	public function setOfficialreceipt($officialreceipt){
		$this->officialreceipt = $officialreceipt;
	}
	
	public function getDateissued(){
		return $this->dateissued;
	}
	
	public function setDateissued($dateissued){
		$this->dateissued = $dateissued;
	}
	
	public function getCertificateofcover(){
		return $this->certificateofcover;
	}
	
	public function setCertificateofcover($certificateofcover){
		$this->certificateofcover = $certificateofcover;
	}
	
	public function getBusinessandprofession(){
		return $this->businessandprofession;
	}
	
	public function setBusinessandprofession($businessandprofession){
		$this->businessandprofession = $businessandprofession;
	}
	
	public function getAddress(){
		return $this->address;
	}
	
	public function setAddress($address){
		$this->address = $address;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setName($name){
		$this->name = $name;
	}
	
	public function getPolicy(){
		return $this->policy;
	}
	
	public function setPolicy($policy){
		$this->policy = $policy;
	}
	
	public function getLto(){
		return $this->lto;
	}
	
	public function setLto($lto){
		$this->lto = $lto;
	}
	
	public function getIsap(){
		return $this->isap;
	}
	
	public function setIsap($isap){
		$this->isap = $isap;
	}
	
	public function getNo(){
		return $this->no;
	}
	
	public function setNo($no){
		$this->no = $no;
	}
	
	public function getUnladenweight(){
		return $this->unladenweight;
	}
	
	public function setUnladenweight($unladenweight){
		$this->unladenweight = $unladenweight;
	}
	
	//
    
	public function getDateCreated(){
		return $this->datecreated;
	}
	
	public function setDateCreated(DateTime $date){
		$this->datecreated = $date;
	}
	
	public function getStartofinsurance(){
		return $this->startofinsurance;
	}
	
	public function setStartofinsurance(DateTime $date){
		$this->startofinsurance = $date;
	}
	
	public function getEndofinsurance(){
		return $this->endofinsurance;
	}
	
	public function setEndofinsurance(DateTime $date){
		$this->endofinsurance = $date;
	}
	
	
	
	/**
     * @param Collection $claimbodilyinjuries
     */
    public function addClaimbodilyinjuries(Collection $claimbodilyinjuries)
    {
        foreach ($claimbodilyinjuries as $claimbodilyinjury) {
			$claimbodilyinjury->setPolicy($this);
            $this->claimbodilyinjuries->add($claimbodilyinjury);
        }
    }

    /**
     * @param Collection $claimbodilyinjuries
     */
    public function removeClaimbodilyinjuries(Collection $claimbodilyinjuries)
    {
        foreach ($claimbodilyinjuries as $claimbodilyinjury) {
            $claimbodilyinjury->setPolicy(null);
            $this->claimbodilyinjuries->removeElement($claimbodilyinjury);
        }
    }

    /**
     * @return Collection $claimbodilyinjuries
     */
    public function getClaimbodilyinjuries()
    {
        return $this->claimbodilyinjuries;
    }
	
	public function removeClaimbodilyinjury(Claimbodilyinjuries $claimbodilyinjury){
		$claimbodilyinjury->setPolicy(null);
        $this->claimbodilyinjuries->removeElement($claimbodilyinjury);
	}
	
	/**
     * @param Collection $claimdisablement
     */
    public function addClaimdisablement(Collection $claimdisablements)
    {
        foreach ($claimdisablements as $claimdisablement) {
			$claimdisablement->setPolicy($this);
            $this->claimdisablement->add($claimdisablement);
        }
    }

    /**
     * @param Collection $claimdisablement
     */
    public function removeClaimdisablement(Collection $claimdisablements)
    {
        foreach ($claimdisablements as $claimdisablement) {
            $claimdisablement->setPolicy(null);
            $this->claimdisablement->removeElement($claimdisablement);
        }
    }

    /**
     * @return Collection $claimdisablement
     */
    public function getClaimdisablement()
    {
        return $this->claimdisablement;
    }
	
	public function removeClaimdisablementSingle(Claimdisablement $claimdisablement){
		$claimdisablement->setPolicy(null);
        $this->claimdisablement->removeElement($claimdisablement);
	}
	
	public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
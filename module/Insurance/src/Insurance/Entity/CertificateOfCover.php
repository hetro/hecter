<?php
namespace Insurance\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Insurance\Entity\User;
use DateTime;

/** 
	* @ORM\Entity
	* @ORM\Table(name="certificateofcover")	
*/
class CertificateOfCover {
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
	
	
	public function getId(){
		return $this->id;
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
	
	public function exchangeArray($data)
    {
		$this->id     = (isset($data['id'])) ? $data['id'] : 0;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
		$this->datecreated  = (isset($data['datecreated'])) ? $data['datecreated'] : null;
    }
	
	public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
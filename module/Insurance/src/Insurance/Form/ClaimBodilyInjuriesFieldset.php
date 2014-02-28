<?php
namespace Insurance\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class ClaimBodilyInjuriesFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('claimbodilyinjuries');

        $this->setHydrator(new DoctrineHydrator($objectManager,'Insurance\Entity\ClaimBodilyInjuries'))->setObject(new \Insurance\Entity\ClaimBodilyInjuries());
		
		$this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
		
		$select = new \Zend\Form\Element\Select('professional');
		$select->setValueOptions(array(
			 'Hospital Rooms' => 'Hospital Rooms',
			 'Surgical Expenses' => 'Surgical Expenses',
			 'Anaesthesiologists Fees' => 'Anaesthesiologists Fees',
			 'Operating Room' => 'Operating Room',
			 'Medical Expenses' => 'Medical Expenses',
			 'Drugs and Medicine' => 'Drugs and Medicine',
			 'Ambulance' => 'Ambulance',
		));
		$this->add($select);
		
		$select = new \Zend\Form\Element\Select('servicesrendered');
		$select->setValueOptions(array(
			 'Maxium of 45 days per Accident (P/day)' => 'Maxium of 45 days per Accident (P/day)',
			 'Laboratory examination fees, X-rays' => 'Laboratory examination fees, X-rays',
			 'Major Operation' => 'Major Operation',
			 'Medium Operation' => 'Medium Operation',
			 'Minor Operation' => 'Minor Operation',
			 'For Daily Visits of Practitioner or Specialist' => 'For Daily Visits of Practitioner or Specialist',
			 'The total Amount of Medical Expenses must not exceed' => 'The total Amount of Medical Expenses must not exceed',
			 'Actual Value of Drugs and Medicine used but not to exceed' => 'Actual Value of Drugs and Medicine used but not to exceed',
			 'Actual amount charged for ambulance transport but not exceed' => 'Actual amount charged for ambulance transport but not exceed',
		));
		$this->add($select);
		
		$this->add(array(
            'name' => 'reimbursablefee',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		
		
    }
	
	public function getInputFilterSpecification(){
		return array(
           
        );
	}

    
}
<?php
namespace Insurance\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class ClaimDisablementFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('claimdisablement');

        $this->setHydrator(new DoctrineHydrator($objectManager,'Insurance\Entity\ClaimDisablement'))->setObject(new \Insurance\Entity\ClaimDisablement());
		
		$this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
		
		
		$select = new \Zend\Form\Element\Select('loss');
		$select->setValueOptions(array(
			 'Two Limbs' => 'Two Limbs',
			 'Both Hards, or All Fingers & Both Thumbs' => 'Both Hards, or All Fingers & Both Thumbs',
			 'Both Feet' => 'Both Feet',
			 'One Hand & One Foot' => 'One Hand & One Foot',
			 'Arm at/or above elbow' => 'Arm at/or above elbow',
			 'Arm between elbow and wrist' => 'Arm between elbow and wrist',
			 'One Hand' => 'One Hand',
			 'Four Fingers & Thumb of one Hand' => 'Four Fingers & Thumb of one Hand',
			 'Four Fingers' => 'Four Fingers',
			 'Thumb' => 'Thumb',
			 'Index Finger' => 'Index Finger',
			 'Leg at/or above knee' => 'Leg at/or above knee',
			 'Leg below knee' => 'Leg below knee',
			 'One Foot' => 'One Foot',
			 'All toes of one foot' => 'All toes of one foot',
			 'Sight of both eyes' => 'Sight of both eyes',
			 'Sight of one eye' => 'Sight of one eye',
			 'Hearing - Both ears' => 'Hearing - Both ears',
			 'Hearing - One ears' => 'Hearing - One ears',
			 'Injuries resulting in being permanently bedridden' => 'Injuries resulting in being permanently bedridden',
			 'Any other injury causing permanent total disablement' => 'Any other injury causing permanent total disablement',
		));
		$this->add($select);
		
		$this->add(array(
            'name' => 'amount',
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
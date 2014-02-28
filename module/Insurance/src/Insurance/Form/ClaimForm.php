<?php
namespace Insurance\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;

class ClaimForm extends Form
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('form-claim');

        $this->setHydrator( new DoctrineHydrator($objectManager, 'Insurance\Entity\Policy') );

        $policy = new PolicyFieldset($objectManager);
        $policy->setUseAsBaseFieldset(true);
        $this->add($policy);

        // … add CSRF and submit elements …

        // Optionally set your validation group here
		$this->setValidationGroup(
			array(
            	'policy' => array(
					'claimbodilyinjuries',
					'claimdisablement',
					#'price',
				)
			)
		);
    }
}
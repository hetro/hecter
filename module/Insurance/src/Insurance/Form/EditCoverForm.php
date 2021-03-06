<?php
namespace Insurance\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;

class EditCoverForm extends Form
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('form-certificateofcover');

        $this->setHydrator( new DoctrineHydrator($objectManager, 'Insurance\Entity\CertificateOfCover') );

        $insurance = new CoverFieldset($objectManager);
        $insurance->setUseAsBaseFieldset(true);
        $this->add($insurance);

        // … add CSRF and submit elements …

        // Optionally set your validation group here
		$this->setValidationGroup(
			array(
            	'cover' => array(
					#'title',
					#'price',
				)
			)
		);
    }
}
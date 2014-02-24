<?php
namespace Insurance\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

use Zend\Form\Element;

class CoverFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('cover');

        $this->setHydrator(new DoctrineHydrator($objectManager,'Insurance\Entity\CertificateOfCover'))->setObject(new \Insurance\Entity\CertificateOfCover());
		
		$this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
		
		$this->add(array(
            'name' => 'authorizedcapacity',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'motornumber',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'chassisnumber',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'platenumber',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'bltfilenumber',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$select = new Element\Select('color');
		$select->setEmptyOption('Select Color');
		$select->setValueOptions(array(
			 'Blue' => 'Blue',
			 'Black' => 'Black',
			 'Red' => 'Red',
			 'etc' => 'etc',
		));
		$this->add($select);
		
		$select = new Element\Select('typeofbody');
		$select->setEmptyOption('Select Type of Body');
		$select->setValueOptions(array(
			 'Motorcycle' => 'Motorcycle',
			 'Tricycle' => 'Tricycle',
			 'Private Car' => 'Private Car',
			 'Commercial Vehicle' => 'Commercial Vehicle',
		));
		$this->add($select);
		
		$select = new Element\Select('make');
		$select->setEmptyOption('Select Make');
		$select->setValueOptions(array(
			 'Honda' => 'Honda',
			 'Kawasaki' => 'Kawasaki',
		));
		$this->add($select);
		
		
		$select = new Element\Select('model');
		$select->setEmptyOption('Select Model');
		$select->setValueOptions(array(
			 '2007' => '2007',
			 '2008' => '2008',
			 '2009' => '2009',
			 '2010' => '2010',
			 '2011' => '2011',
			 '2012' => '2012',
			 '2013' => '2013',
			 '2014' => '2014',
			 '2015' => '2015',
		));
		$this->add($select);
		
		$this->add(array(
            'name' => 'officialreceipt',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'dateissued',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'no',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'certificateofcover',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'businessandprofession',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'address',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'policy',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'lto',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'isap',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'no',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'unladenweight',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
			 'type' => 'Zend\Form\Element\DateTime',
			 'name' => 'startofinsurance',
			 'options' => array(

					 'format' => 'Y-m-d H:i'
			 ),
			 'attributes' => array(
					 'min' => '2013-01-01 00:00',
					 'max' => '2020-01-01 00:00',
					 'step' => '1', // minutes; default step interval is 1 min
			 )
		 )
		);
		
		$this->add(array(
			 'type' => 'Zend\Form\Element\DateTime',
			 'name' => 'endofinsurance',
			 'options' => array(

					 'format' => 'Y-m-d H:i'
			 ),
			 'attributes' => array(
					 'min' => '2013-01-01 00:00',
					 'max' => '2020-01-01 00:00',
					 'step' => '1', // minutes; default step interval is 1 min
			 )
		 )
		);
		
    }
	
	public function getInputFilterSpecification(){
		return array(
           
        );
	}

    
}
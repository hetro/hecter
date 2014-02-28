<?php
namespace Insurance\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

use Zend\Form\Element;

class PolicyFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('policy');

        $this->setHydrator(new DoctrineHydrator($objectManager,'Insurance\Entity\Policy'))->setObject(new \Insurance\Entity\Policy());
		
		$this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
		
		$this->add(array(
            'name' => 'premiumpaid',
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
		
		$this->add(array(
            'name' => 'authenticationfee',
            'attributes' => array(
                'type'  => 'text',
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
			 'Private Cars (including jeeps & utility vehicles)' => 'Private Cars (Including jeeps & utility vehicles)',
			 'CV Light/Medium Trucks (own goods) not over 3930 kgs.' => 'CV Light/Medium Trucks (Own goods) not over 3930 kgs.',
			 'Heavy Trucks (own goods) & Private Buses over 3930 kgs.' => 'Heavy Trucks (own goods) & Private Buses over 3930 kgs.',
			 'AC & Tourist Cars' => 'AC & Tourist Cars',
			 'Taxi, PUJ & Mini Bus' => 'Taxi, PUJ & Mini Bus',
			 'PUB & Tourist Bus' => 'PUB & Tourist Bus',
			 'Motorcycles/Tricycles/Trailers' => 'Motorcycles/Tricycles/Trailers',
			 
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
		
		$claim = new ClaimBodilyInjuriesFieldset($objectManager);
        $this->add(array(
            'type'    => 'Zend\Form\Element\Collection',
            'name'    => 'claimbodilyinjuries',
            'options' => array(
                'count'           => 1,
                'target_element' => $claim
            )
        ));
		
		$claim = new ClaimDisablementFieldset($objectManager);
        $this->add(array(
            'type'    => 'Zend\Form\Element\Collection',
            'name'    => 'claimdisablement',
            'options' => array(
                'count'           => 1,
                'target_element' => $claim
            )
        ));
		
    }
	
	public function getInputFilterSpecification(){
		return array(
		   	'premiumpaid' => array('required' => true),
			'authenticationfee' => array('required' => true),
			'authorizedcapacity' => array('required' => true),
			'motornumber' => array('required' => true),
			'chassisnumber' => array('required' => true),
			'platenumber' => array('required' => true),
			'bltfilenumber' => array('required' => true),
			'color' => array('required' => true),
			'typeofbody' => array('required' => true),
			'make' => array('required' => true),
			'model' => array('required' => true),
			'officialreceipt' => array('required' => true),
			'dateissued' => array('required' => true),
			'no' => array('required' => true),
			'certificateofcover' => array('required' => true),
			'businessandprofession' => array('required' => true),
			'address' => array('required' => true),
			'name' => array('required' => true),
			'lto' => array('required' => true),
			'isap' => array('required' => true),
			'unladenweight' => array('required' => true),
			'startofinsurance' => array('required' => true),
			'endofinsurance' => array('required' => true),
			'claimbodilyinjuries' => array('required' => true),
			'claimdisablement' => array('required' => true),
        );
	}

    
}
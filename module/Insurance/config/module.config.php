<?php
return array(
	'doctrine' => array(
	  'driver' => array(
		'application_entities' => array(
		  'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
		  'cache' => 'array',
		  'paths' => array(__DIR__ . '/../src/Insurance/Entity')
		),
	
		'orm_default' => array(
		  'drivers' => array(
			'Insurance\Entity' => 'application_entities'
		  )
	))),

	'controllers' => array(
        'invokables' => array(
            'Insurance' => 'Insurance\Controller\InsuranceController',
			'Profiling' => 'Insurance\Controller\ProfilingController',
			'Monitoring' => 'Insurance\Controller\MonitoringController',
			'Report' => 'Insurance\Controller\ReportController',
            // Do similar for each other controller in your module
        ),
    ),
	
	'router' => array(
		'routes' => array(
			'zfcuser' => array(
                'options' => array(
                    'route' => '/account',
					'defaults' => array(
						'controller' => 'zfcuser',
					),
                ),
			),
			
			'insurance' => array(
				'type'    => 'Literal',
				'options' => array(
					'route'    => '/insurance',
					'defaults' => array(
						'controller'    => 'Insurance',
						'action'        => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'action' => array(
						'type'    => 'Segment',
						'options' => array(
							'route'    => '/[:action[/:id]]',
							'constraints' => array(
								'id'     => '[0-9]*',
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
							),
						),
					),
				),
			),
			
			'profiling' => array(
				'type'    => 'Literal',
				'options' => array(
					'route'    => '/profiling',
					'defaults' => array(
						'controller'    => 'Profiling',
						'action'        => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'action' => array(
						'type'    => 'Segment',
						'options' => array(
							'route'    => '/[:action[/:id]]',
							'constraints' => array(
								'id'     => '[0-9]*',
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
							),
						),
					),
				),
			),
			
			'monitoring' => array(
				'type'    => 'Literal',
				'options' => array(
					'route'    => '/monitoring',
					'defaults' => array(
						'controller'    => 'Monitoring',
						'action'        => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'action' => array(
						'type'    => 'Segment',
						'options' => array(
							'route'    => '/[:action[/:id]]',
							'constraints' => array(
								'id'     => '[0-9]*',
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
							),
						),
					),
				),
			),
			
			'report' => array(
				'type'    => 'Literal',
				'options' => array(
					'route'    => '/report',
					'defaults' => array(
						'controller'    => 'Report',
						'action'        => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'action' => array(
						'type'    => 'Segment',
						'options' => array(
							'route'    => '/[:action[/:id]]',
							'constraints' => array(
								'id'     => '[0-9]*',
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
							),
						),
					),
				),
			),
			
		),
	),
	
    'view_manager' => array(
        'template_path_stack' => array(
            'event' => __DIR__ . '/../view'
        ),
    ),
	
	'service_manager' => array(
		'factories' => array(
			'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
		),
    ),
);
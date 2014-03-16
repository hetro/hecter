<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Insurance\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class InsuranceController extends AbstractActionController
{
		
	public function indexAction(){
		if (!$this->zfcUserAuthentication()->hasIdentity()) {			
			
			$redirect = $this->getRequest()->getRequestUri();			
			$this->getRequest()->getQuery()->set('redirect', $redirect);
			return $this->forward()->dispatch('zfcuser', array(
				'action' => 'login'
			));
        }
	}
	
	public function settingsAction(){
		if (!$this->zfcUserAuthentication()->hasIdentity()) {			
			
			$redirect = $this->getRequest()->getRequestUri();			
			$this->getRequest()->getQuery()->set('redirect', $redirect);
			return $this->forward()->dispatch('zfcuser', array(
				'action' => 'login'
			));
        }
		
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		
		$settings = $objectManager->getRepository('Insurance\Entity\Settings')->findAll();
		
		
		if ($this->request->isPost()) {
			$validator = new \Zend\I18n\Validator\Float();
			
			foreach($this->request->getPost() as $k => $request){
				if($validator->isValid($request)) {
					$tmp = $objectManager->getRepository('Insurance\Entity\Settings')->find( $k );
					$tmp->setValue($request);
					if($tmp) $objectManager->persist($tmp);
				}
			}
			
			$objectManager->flush();
		}
		
		
		return array( 'settings' => $settings );
	}
}

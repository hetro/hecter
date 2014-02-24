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

class MonitoringController extends AbstractActionController
{
	public function calculateInsuredVehicleAction(){
		if (!$this->zfcUserAuthentication()->hasIdentity()) {			
			
			$redirect = $this->getRequest()->getRequestUri();			
			$this->getRequest()->getQuery()->set('redirect', $redirect);
			return $this->forward()->dispatch('zfcuser', array(
				'action' => 'login'
			));
        }
		$start = $this->getRequest()->getQuery('start');
		$end = $this->getRequest()->getQuery('end');
		$tmp = new \DateTime("now");
		if(empty($start)) $start = $tmp->format('Y-m-d');
		if(empty($end)) $end = $tmp->format('Y-m-d');		
		
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$query = $objectManager->createQuery("SELECT c FROM Insurance\Entity\Policy c WHERE c.dateissued between '$start' and '$end' ORDER BY c.id DESC");
		$list = $query->getResult();
		
		return array('list' => $list, 'start' => $start , 'end' => $end);	
	}
		
	public function indexAction(){
		if (!$this->zfcUserAuthentication()->hasIdentity()) {			
			
			$redirect = $this->getRequest()->getRequestUri();			
			$this->getRequest()->getQuery()->set('redirect', $redirect);
			return $this->forward()->dispatch('zfcuser', array(
				'action' => 'login'
			));
        }
	}
}

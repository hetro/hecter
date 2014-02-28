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
	public function claimSettingsAction(){
		if (!$this->zfcUserAuthentication()->hasIdentity()) {			
			
			$redirect = $this->getRequest()->getRequestUri();			
			$this->getRequest()->getQuery()->set('redirect', $redirect);
			return $this->forward()->dispatch('zfcuser', array(
				'action' => 'login'
			));
        }
		
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$query = $objectManager->createQuery("SELECT c FROM Insurance\Entity\Policy c ORDER BY c.id DESC");
		$list = $query->getResult();
		
		return array('list' => $list);	
	}
	
	public function productionReportAction(){
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
	
	public function checkInsuranceExpirationAction(){
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
		
		$now = new \DateTime("now");
		
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$query = $objectManager->createQuery("SELECT c FROM Insurance\Entity\Policy c WHERE c.endofinsurance > ?1 AND c.endofinsurance < ?2 ORDER BY c.endofinsurance ASC");
		$query->setParameter(1, $now->format('Y-m-d H:i:s'));
		$query->setParameter(2, $now->modify('+1 week')->format('Y-m-d H:i:s'));
		$list = $query->getResult();
		
		return array('list' => $list, 'start' => $start , 'end' => $end);
	}
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
		$query = $objectManager->createQuery("SELECT c FROM Insurance\Entity\Policy c WHERE c.dateissued between '$start' and '$end' ORDER BY c.endofinsurance ASC");
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

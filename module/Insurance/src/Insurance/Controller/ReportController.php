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

class ReportController extends AbstractActionController
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
	
	public function productionReportAction(){
		if (!$this->zfcUserAuthentication()->hasIdentity()) {			
			
			$redirect = $this->getRequest()->getRequestUri();			
			$this->getRequest()->getQuery()->set('redirect', $redirect);
			return $this->forward()->dispatch('zfcuser', array(
				'action' => 'login'
			));
        }
		
		$month = $this->getRequest()->getQuery('month');
		if(empty($month)) $month = new \DateTime("now"); 
		else $month = new \DateTime($month);
		
		
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$query = $objectManager->createQuery("SELECT c FROM Insurance\Entity\Policy c WHERE c.dateissued LIKE '".$month->format('Y-m')."%' ORDER BY c.id DESC");
		$list = $query->getResult();
		
		return array('list' => $list, 'month' => $month );
	}
	
	public function collectionReportAction(){
		if (!$this->zfcUserAuthentication()->hasIdentity()) {			
			
			$redirect = $this->getRequest()->getRequestUri();			
			$this->getRequest()->getQuery()->set('redirect', $redirect);
			return $this->forward()->dispatch('zfcuser', array(
				'action' => 'login'
			));
        }
		
		$month = $this->getRequest()->getQuery('month');
		if(empty($month)) $month = new \DateTime("now"); 
		else $month = new \DateTime($month);
		
		
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$query = $objectManager->createQuery("SELECT c FROM Insurance\Entity\Policy c WHERE c.dateissued LIKE '".$month->format('Y-m')."%' ORDER BY c.id DESC");
		$list = $query->getResult();
		
		return array('list' => $list, 'month' => $month );
	}
}

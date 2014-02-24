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

class ProfilingController extends AbstractActionController
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
	
	public function viewCertificateOfCoverAction(){
		if (!$this->zfcUserAuthentication()->hasIdentity()) {			
			
			$redirect = $this->getRequest()->getRequestUri();			
			$this->getRequest()->getQuery()->set('redirect', $redirect);
			return $this->forward()->dispatch('zfcuser', array(
				'action' => 'login'
			));
        }
		
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$query = $objectManager->createQuery("SELECT c FROM Insurance\Entity\CertificateOfCover c ORDER BY c.id DESC");
		$list = $query->getResult();
		
		return array('list' => $list);	
	}
		
	public function indexAction(){
		
	}
	
	public function certificateofcoverAction(){
		if (!$this->zfcUserAuthentication()->hasIdentity()) {			
			
			$redirect = $this->getRequest()->getRequestUri();			
			$this->getRequest()->getQuery()->set('redirect', $redirect);
			return $this->forward()->dispatch('zfcuser', array(
				'action' => 'login'
			));
        }
		
		$id = (int) $this->params()->fromRoute('id', 0);
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		
		// Create the form and inject the ObjectManager
		$form = new \Insurance\Form\AddPolicyForm($objectManager);
		
		if(!$id){
			// Create a new, empty entity and bind it to the form
			$policy = new \Insurance\Entity\Policy();
			$objectManager->persist($policy);
		}
		else $policy = $objectManager->getRepository('Insurance\Entity\Policy')->find( $id );
		
		$form->bind($policy);
		
		if ($this->request->isPost()) {
			$form->setData($this->request->getPost());
	
			if ($form->isValid()) {
				
				$tmpid = $policy->getId();
				if(empty($tmpid))
				switch($policy->getTypeofbody()){
		
					case 'Private Cars (including jeeps & utility vehicles)' : $policy->setPremiumpaid(447.11); break;
					case 'CV Light/Medium Trucks (own goods) not over 3930 kgs.' : $policy->setPremiumpaid(487.03); break;
					case 'Heavy Trucks (own goods) & Private Buses over 3930 kgs.' : $policy->setPremiumpaid(958.08); break;
					case 'AC & Tourist Cars' : $policy->setPremiumpaid(590.82); break;
					case 'Taxi, PUJ & Mini Bus' : $policy->setPremiumpaid(878.24); break;
					case 'PUB & Tourist Bus' : $policy->setPremiumpaid(1157.69); break;
					case 'Motorcycles/Tricycles/Trailers' : $policy->setPremiumpaid(199.6); break;
					default : $policy->setPremiumpaid(250); break;
				}
				
				
				$policy->setDatecreated(new \DateTime("now"));
				
				$policy->setVat( $policy->getPremiumpaid() * .12 );
				$policy->setStamps( $policy->getPremiumpaid() * .12 );
				$policy->setLgt( $policy->getPremiumpaid() * .0075 );
				
				$policy->setTotalamountdue( $policy->getPremiumpaid() + $policy->getAuthenticationfee() + $policy->getVat() + $policy->getStamps() + $policy->getLgt() );
				
				$objectManager->flush();
				
				if(empty($tmpid)) return $this->redirect()->toRoute('profiling/action', array( 'action' => 'certificateofcover' , 'id' => $policy->getId() ));
				else return $this->redirect()->toRoute('profiling/action', array( 'action' => 'view-official-receipt' , 'id' => $policy->getId() ));
				
			}
		}
	
		return array('form' => $form , 'policy' => $policy );
		
		
	}
	
	public function viewOfficialReceiptAction(){
		if (!$this->zfcUserAuthentication()->hasIdentity()) {			
			
			$redirect = $this->getRequest()->getRequestUri();			
			$this->getRequest()->getQuery()->set('redirect', $redirect);
			return $this->forward()->dispatch('zfcuser', array(
				'action' => 'login'
			));
        }
		
		$id = (int) $this->params()->fromRoute('id', 0);
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		
		$policy = $objectManager->getRepository('Insurance\Entity\Policy')->find( $id );
		
		return array('policy' => $policy);
	}
	
	/*public function policyAction(){
		if (!$this->zfcUserAuthentication()->hasIdentity()) {			
			
			$redirect = $this->getRequest()->getRequestUri();			
			$this->getRequest()->getQuery()->set('redirect', $redirect);
			return $this->forward()->dispatch('zfcuser', array(
				'action' => 'login'
			));
        }
		
		$id = (int) $this->params()->fromRoute('id', 0);
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		
		// Create the form and inject the ObjectManager
		$form = new \Insurance\Form\AddPolicyForm($objectManager);
		
		if(!$id){
			// Create a new, empty entity and bind it to the form
			$policy = new \Insurance\Entity\Policy();
			$objectManager->persist($policy);
		}
		else $policy = $objectManager->getRepository('Insurance\Entity\Policy')->find( $id );
		
		$form->bind($policy);
		
		if ($this->request->isPost()) {
			$form->setData($this->request->getPost());
	
			if ($form->isValid()) {
				
				$policy->setDatecreated(new \DateTime("now"));
				
				$policy->setVat( $policy->getPremiumpaid() * .12 );
				$policy->setStamps( $policy->getPremiumpaid() * .12 );
				$policy->setLgt( $policy->getPremiumpaid() * .0075 );
				
				$policy->setTotalamountdue( $policy->getPremiumpaid() + $policy->getAuthenticationfee() + $policy->getVat() + $policy->getStamps() + $policy->getLgt() );
				
				$objectManager->flush();
				
				return $this->redirect()->toRoute('profiling/action', array( 'action' => 'policy' , 'id' => $policy->getId() ));
			}
		}
	
		return array('form' => $form , 'policy' => $policy );
		
		
	}*/
}

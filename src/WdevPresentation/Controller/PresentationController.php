<?php
namespace WdevPresentation\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use WdevPresentation\Model\Presentation;
use WdevPresentation\Form\PresentationForm;

class PresentationController extends AbstractActionController
{
    protected $presentationTable;
    
    
    public function getPresentationTable()
    {
        if (!$this->presentationTable) {
            $sm = $this->getServiceLocator();
            $this->presentationTable = $sm->get('WdevPresentation\Model\PresentationTable');
        }
        return $this->presentationTable;
    }
    
    public function indexAction()
    {
        return new ViewModel(array(
            'presentations' => $this->getPresentationTable()->fetchAll(),
        ));
    }


    public function viewAction()
    {
        //$view = $this->layout();
        //$layout->setTemplate('wdev-presentation/layout/presentation.phtml');
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('presentation', array(
                'action' => 'index'
            ));
        }
        
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        $viewModel->setVariables(array('presentation' => $this->getPresentationTable()->getPresentation($id)));
        return $viewModel;
        
    }
   
    public function addAction()
    {
        $form = new PresentationForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $presentation = new Presentation();
            $form->setInputFilter($presentation->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $presentation->exchangeArray($form->getData());
                $this->getPresentationTable()->savePresentation($presentation);

                
                return $this->redirect()->toRoute('presentation');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('presentation', array(
                'action' => 'add'
            ));
        }
        $presentation = $this->getPresentationTable()->getPresentation($id);

        $form  = new PresentationForm();
        $form->bind($presentation);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($presentation->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getPresentationTable()->savePresentation($form->getData());

                
                return $this->redirect()->toRoute('presentation');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('presentation');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getPresentationTable()->deletePresentation($id);
            }

            return $this->redirect()->toRoute('presentation');
        }

        return array(
            'id'    => $id,
            'presentation' => $this->getPresentationTable()->getPresentation($id)
        );
    }
}
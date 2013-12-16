<?php

App::uses('AppController', 'Controller');

class NodeSortController extends AppController
{

    public function beforeFilter()
    {
        $this->Node = ClassRegistry::init('Nodes.Node');
    }

    public function admin_moveup($id, $step = 1)
    {
        $this->Node->recursive = -1;
        $node = $this->Node->findById($id);
        if (!isset($node['Node']['id'])) {
            $this->Session->setFlash(__('Invalid node id'), 'default', array('class' => 'error'));
            $this->NodeSort->nodeRedirect($type);
        }
        $type = $node['Node']['type'];
        $this->Node->Behaviors->attach('Tree', array('scope' => array('Node.type' => $type)));
        if ($this->Node->moveUp($id, $step)) {
            $this->Session->setFlash(__('Moved up successfully'), 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('Could not move up'), 'default', array('class' => 'error'));
        }
        $this->redirect(array('plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'index', 'admin' => true, '?' => array('type' => $type)));
    }

    public function admin_movedown($id, $step =1)
    {
        $this->Node->recursive = -1;
        $node = $this->Node->findById($id);
        if (!isset($node['Node']['id'])) {
            $this->Session->setFlash(__('Invalid node id'), 'default', array('class' => 'error'));
            $this->NodeSort->nodeRedirect($type);
        }
        $type = $node['Node']['type'];
        $this->Node->Behaviors->attach('Tree', array('scope' => array('Node.type' => $type)));
        if ($this->Node->moveDown($id, $step)) {
            $this->Session->setFlash(__('Moved down successfully'), 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('Could not move down'), 'default', array('class' => 'error'));
        }
        $this->redirect(array('plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'index', 'admin' => true, '?' => array('type' => $type)));

    }

}

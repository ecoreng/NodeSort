<?php

class NodeSortActivation {

	public function beforeActivation(&$controller) {
		return true;
	}

	public function onActivation(&$controller) {
		// ACL: set ACOs with permissions
		$controller->Croogo->addAco('NodeSort/NodeSort/admin_moveup');
		$controller->Croogo->addAco('NodeSort/NodeSort/admin_movedown');                
	}

	public function beforeDeactivation(&$controller) {
		return true;
	}

	public function onDeactivation(&$controller) {
		// ACL: remove ACOs with permissions
		$controller->Croogo->removeAco('NodeSort'); 
	}
}

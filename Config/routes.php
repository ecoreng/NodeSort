<?php
CroogoRouter::connect('/admin/NodeSort/:controller/:action/:id', array('plugin' => 'NodeSort', 'admin' => true), array('pass' => array('id')));


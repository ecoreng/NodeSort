<?php

Croogo::hookRoutes('NodeSort');
Croogo::hookBehavior('Node', 'NodeSort.NodeSort', array());

Croogo::hookAdminRowAction('Nodes/admin_index', 'up', array(
        'plugin:NodeSort/controller:NodeSort/action:moveup/:id' => array(
                'title' => false,
                'options' => array(
                        'icon' => 'chevron-up',
                        'tooltip' => array(
                                'data-title' => 'Move this item up',
                        ),
                ),
        ),
));
Croogo::hookAdminRowAction('Nodes/admin_index', 'down', array(
        'plugin:NodeSort/controller:NodeSort/action:movedown/:id' => array(
                'title' => false,
                'options' => array(
                        'icon' => 'chevron-down',
                        'tooltip' => array(
                                'data-title' => 'Move this item down',
                        ),
                ),
        ),
));

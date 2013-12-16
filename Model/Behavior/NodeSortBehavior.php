<?php

App::uses('ModelBehavior', 'Model');

class NodeSortBehavior extends ModelBehavior
{

    public function beforeFind($Model, $query)
    {
        if (get_class($Model) == "Node") {
            if($query['order'][0] == 'Node.created DESC') {
                $query['order'][0] = "Node.lft ASC";
                $query['order'][] = 'Node.created DESC';
            }
        }
        return $query;
    }

}

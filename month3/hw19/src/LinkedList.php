<?php

namespace month3\hw14;

class LinkedList
{
    public $head = null;

    public function createList($values, $pos) {

        if (empty($values)) return null;

        $this->head = new ListNode($values[0]);
        $current = $this->head;
        $cycleNode = null;

        for ($i = 1; $i < count($values); $i++) {
            $current->next = new ListNode($values[$i]);
            $current = $current->next;

            if ($i == $pos) {
                $cycleNode = $current;
            }
        }

        if ($pos >= 0) {
            $current->next = $cycleNode;
        }

        return $this->head;
    }
}

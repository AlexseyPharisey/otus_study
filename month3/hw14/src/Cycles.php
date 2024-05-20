<?php

declare(strict_types=1);

use month3\hw14\LinkedList;

require __DIR__ . '/../vendor/autoload.php';

$values = [3, 2, 0, -4];
//        $values = [1,2];
//        $values = [1];
$pos = 1;
//        $pos = 0;
//        $pos = -1;

$linkedList = new LinkedList();
$cycle = $linkedList->createList($values, $pos);

function hasCycle($head) {
    $slow_pointer = $head;
    $fast_pointer = $head;
    while ($fast_pointer !== null && $fast_pointer->next !== null) {
        $slow_pointer = $slow_pointer->next;
        $fast_pointer = $fast_pointer->next->next;
        if ($slow_pointer === $fast_pointer) {
            return true;
        }
    }

    return false;
}


echo hasCycle($cycle);
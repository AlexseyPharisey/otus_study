<?php

declare(strict_types=1);
class IntersectionTwoLinkedLists
{
    /**
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode|null
     */
    function getIntersectionNode($headA, $headB): ?ListNode
    {
        $a1 = $headA;
        $b1 = $headB;
        $a1C = 0;
        $b1C = 0;

        while ($a1 || $b1) {
            if ($a1) {
                $a1C++;
                $a1 = $a1->next;
            }
            if ($b1) {
                $b1C++;
                $b1 = $b1->next;
            }
        }
        $a1 = $headA;
        $b1 = $headB;

        if ($a1C>$b1C){
            while($a1C > $b1C) {
                $a1=$a1->next;
                $a1C--;
            }
        } elseif ($a1C < $b1C) {
            while($a1C < $b1C) {
                $b1 = $b1->next;
                $b1C--;
            }
        }
        while ($b1||$a1){
            if ($a1===$b1) {
                return $b1 ?? $a1;
            }
            $a1 = $a1->next;
            $b1 = $b1->next;
        }
        return null;

    }
}

class ListNode {
    public $val = 0;
    public $next = null;

    function __construct($val = 0) {
        $this->val = $val;
    }
}

$listNode = new ListNode();

$intersectVal = 8;
$listA = [4,1,8,4,5];
$listB = [5,6,1,8,4,5];
$skipA = 2;
$skipB = 3;

$listNodeA = new ListNode($listA);
$listNodeB = new ListNode($listB);

var_dump(
    (new IntersectionTwoLinkedLists())->getIntersectionNode($listNodeA, $listNodeB)
);

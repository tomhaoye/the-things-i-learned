<?php

namespace dataStructure;


class LinkedList
{

    private $next = null;
    private $value = null;

    /**
     * LinkedList constructor.
     * @param $value
     * @param $next
     */
    public function __construct($value, $next)
    {
        $this->next = $next;
        $this->value = $value;
    }

    /**
     * @return null|self
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param self $next
     */
    public function setNext($next)
    {
        $this->next = $next;
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param null $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @param LinkedList $linkedList
     */
    public function printVal($linkedList)
    {
        if (isset($linkedList->value)) {
            print_r($linkedList->value);
            $this->printVal($linkedList->next);
        }
    }

    /**
     * @param self $linkedList
     * @param Huffman $huffmanTree
     */
    public function insert(&$linkedList, $huffmanTree)
    {
        if ($linkedList) {
            if ($huffmanTree->getWeight() <= $linkedList->getValue()->getWeight()) {
                $linkedList = new self($huffmanTree, $linkedList);
            } else {
                $this->insert($linkedList->next, $huffmanTree);
            }
        } else {
            $linkedList = new self($huffmanTree, $linkedList);
        }
    }

    /**
     * @param self $linkedList
     * @param $value
     */
    public function test(&$linkedList, $value)
    {
        if ($linkedList) {
            if ($value <= $linkedList->value) {
                $linkedList = new self($value, $linkedList);
            } else {
                $this->test($linkedList->next, $value);
            }
        } else {
            $linkedList = new self($value, $linkedList);
        }
    }
}

<?php

namespace dataStructure;


class Huffman
{
    private $weight;
    private $parent = null;
    private $letter = null;
    private $leftChild = null;
    private $rightChild = null;

    public function __construct($weight, $parent = null, $leftChild = null, $rightChild = null, $letter)
    {
        $this->weight = $weight;
        $this->parent = $parent;
        $this->letter = $letter;
        $this->leftChild = $leftChild;
        $this->rightChild = $rightChild;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @param null $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @param null $leftChild
     */
    public function setLeftChild($leftChild)
    {
        $this->leftChild = $leftChild;
    }

    /**
     * @param null $rightChild
     */
    public function setRightChild($rightChild)
    {
        $this->rightChild = $rightChild;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @return null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return null
     */
    public function getLeftChild()
    {
        return $this->leftChild;
    }

    /**
     * @return null
     */
    public function getRightChild()
    {
        return $this->rightChild;
    }

    /**
     * @return null
     */
    public function getLetter()
    {
        return $this->letter;
    }

    /**
     * @param null $letter
     */
    public function setLetter($letter)
    {
        $this->letter = $letter;
    }

}

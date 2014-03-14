<?php

namespace Zoop\SkeletonModule\DataModel;

use Doctrine\Common\Collections\ArrayCollection;
use Zoop\SkeletonModule\DataModel\Bone;
//Annotation imports
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Zoop\Shard\Annotation\Annotations as Shard;

/**
 * @ODM\Document
 * @Shard\AccessControl({
 *     @Shard\Permission\Basic(roles="*", allow="read")
 * })
 */
class Skeleton
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\String
     */
    protected $name;

    /**
     * @ODM\EmbedOne(targetDocument="Zoop\SkeletonModule\DataModel\Bone")
     */
    protected $fema;

    /**
     * @ODM\EmbedMany(targetDocument="Zoop\SkeletonModule\DataModel\Bone")
     */
    protected $ribs;

    public function __construct()
    {
        $this->ribs = new ArrayCollection;
    }

    /**
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 
     * @return Bone
     */
    public function getFema()
    {
        return $this->fema;
    }

    /**
     * @return ArrayCollection
     */
    public function getRibs()
    {
        return $this->ribs;
    }

    /**
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Bone $fema
     */
    public function setFema(Bone $fema)
    {
        $this->fema = $fema;
    }

    /**
     * @param ArrayCollection $ribs
     */
    public function setRibs(ArrayCollection $ribs)
    {
        $this->ribs = $ribs;
    }

    /**
     * @param Bone $rib
     */
    public function addRib(Bone $rib)
    {
        $this->getRibs()->add($rib);
    }
    
    /**
     * 
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}

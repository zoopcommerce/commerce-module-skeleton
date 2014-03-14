<?php

namespace Zoop\SkeletonModule\Test\DataModel;

use Zoop\SkeletonModule\Test\BaseTest;
use Zoop\SkeletonModule\DataModel\Skeleton;
use Zoop\SkeletonModule\DataModel\Bone;

class SkeletonTest extends BaseTest
{
    public function testSkeleton()
    {
        $skeleton = new Skeleton;
        $rib1 = new Bone;
        $rib2 = new Bone;
        $fema = new Bone;
        
        $skeleton->setName('Lucy');
        $skeleton->setFema($fema);
        $skeleton->addRib($rib1);
        $skeleton->addRib($rib2);
        
        $this->assertCount(2, $skeleton->getRibs());
        $this->assertInstanceOf('Zoop\SkeletonModule\DataModel\Bone', $skeleton->getFema());
    }
}

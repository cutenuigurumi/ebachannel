<?php

namespace Ebachannel\Front\ThreadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * thread
 */
class thread
{
    /**
     * @var integer
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}

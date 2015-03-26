<?php

namespace Ebachannel\Admin\CategoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * category
 */
class category
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

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

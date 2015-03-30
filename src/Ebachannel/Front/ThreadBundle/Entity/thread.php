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
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $category_id;

    /**
     * @var \DateTime
     */
    private $last_update_time;


    /**
     * Set name
     *
     * @param string $name
     * @return thread
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set category_id
     *
     * @param integer $categoryId
     * @return thread
     */
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;

        return $this;
    }

    /**
     * Get category_id
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set last_update_time
     *
     * @param \DateTime $lastUpdateTime
     * @return thread
     */
    public function setLastUpdateTime($lastUpdateTime)
    {
        $this->last_update_time = $lastUpdateTime;

        return $this;
    }

    /**
     * Get last_update_time
     *
     * @return \DateTime 
     */
    public function getLastUpdateTime()
    {
        return $this->last_update_time;
    }
}

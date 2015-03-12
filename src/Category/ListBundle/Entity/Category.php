<?php

namespace Category\ListBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="int", length=5)
     */
    private $category_id;

    /**
     * @var varchar
     *
     * @ORM\Column(name="category_name", type="varchar", length=20)
     */
    private $category_name;


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
     * Set category_id
     *
     * @param \int $categoryId
     * @return Category
     */
    public function setCategoryId(\int $categoryId)
    {
        $this->category_id = $categoryId;

        return $this;
    }

    /**
     * Get category_id
     *
     * @return \int 
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set category_name
     *
     * @param \varchar $categoryName
     * @return Category
     */
    public function setCategoryName(\varchar $categoryName)
    {
        $this->category_name = $categoryName;

        return $this;
    }

    /**
     * Get category_name
     *
     * @return \varchar 
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }
}

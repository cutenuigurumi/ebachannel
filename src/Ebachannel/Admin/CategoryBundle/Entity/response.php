<?php

namespace Ebachannel\Admin\CategoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * category
 */
class response
{
    
    /**
     * @var integer
     */
    private $no;

    /**
     * @var integer
     */
    private $threadId;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var string
     */
    private $userMail;

    /**
     * @var string
     */
    private $body;

    /**
     * @var integer
     */
    private $deleteFlag;

    /**
     * @var \DateTime
     */
    private $createdAt;


    /**
     * Set no
     *
     * @param integer $no
     * @return response
     */
    public function setNo($no)
    {
        $this->no = $no;

        return $this;
    }

    /**
     * Get no
     *
     * @return integer 
     */
    public function getNo()
    {
        return $this->no;
    }

    /**
     * Set threadId
     *
     * @param integer $threadId
     * @return response
     */
    public function setThreadId($threadId)
    {
        $this->threadId = $threadId;

        return $this;
    }

    /**
     * Get threadId
     *
     * @return integer 
     */
    public function getThreadId()
    {
        return $this->threadId;
    }

    /**
     * Set userName
     *
     * @param string $userName
     * @return response
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set userMail
     *
     * @param string $userMail
     * @return response
     */
    public function setUserMail($userMail)
    {
        $this->userMail = $userMail;

        return $this;
    }

    /**
     * Get userMail
     *
     * @return string 
     */
    public function getUserMail()
    {
        return $this->userMail;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return response
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set deleteFlag
     *
     * @param integer $deleteFlag
     * @return response
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;

        return $this;
    }

    /**
     * Get deleteFlag
     *
     * @return integer 
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return response
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function prePersist()
    {
        // Add your code here
        $this->created_at = new \DateTime();
    }
}

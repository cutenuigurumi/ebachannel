<?php

namespace Ebachannel\Admin\CategoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * response
 */
class response
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $no;

    /**
     * @var string
     */
    private $user_name;

    /**
     * @var string
     */
    private $user_mail;

    /**
     * @var string
     */
    private $body;

    /**
     * @var integer
     */
    private $delete_flag;

    /**
     * @var integer
     */
    private $thread_id;

    /**
     * @var \DateTime
     */
    private $create_time;


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
     * Set user_name
     *
     * @param string $userName
     * @return response
     */
    public function setUserName($userName)
    {
        $this->user_name = $userName;

        return $this;
    }

    /**
     * Get user_name
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * Set user_mail
     *
     * @param string $userMail
     * @return response
     */
    public function setUserMail($userMail)
    {
        $this->user_mail = $userMail;

        return $this;
    }

    /**
     * Get user_mail
     *
     * @return string 
     */
    public function getUserMail()
    {
        return $this->user_mail;
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
     * Set delete_flag
     *
     * @param integer $deleteFlag
     * @return response
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->delete_flag = $deleteFlag;

        return $this;
    }

    /**
     * Get delete_flag
     *
     * @return integer 
     */
    public function getDeleteFlag()
    {
        return $this->delete_flag;
    }

    /**
     * Set thread_id
     *
     * @param integer $threadId
     * @return response
     */
    public function setThreadId($threadId)
    {
        $this->thread_id = $threadId;

        return $this;
    }

    /**
     * Get thread_id
     *
     * @return integer 
     */
    public function getThreadId()
    {
        return $this->thread_id;
    }

    /**
     * Set create_time
     *
     * @param \DateTime $createTime
     * @return response
     */
    public function setCreateTime($createTime)
    {
        $this->create_time = $createTime;

        return $this;
    }

    /**
     * Get create_time
     *
     * @return \DateTime 
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }
}

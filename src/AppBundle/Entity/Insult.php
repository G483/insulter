<?php

namespace AppBundle\Entity;

/**
 * Insult
 */
class Insult
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $insult;

    /**
     * @var int
     */
    private $level;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set insult
     *
     * @param string $insult
     *
     * @return Insult
     */
    public function setInsult($insult)
    {
        $this->insult = $insult;

        return $this;
    }

    /**
     * Get Insult
     *
     * @return string
     */
    public function getInsult()
    {
        return $this->insult;
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return Integer
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }
}


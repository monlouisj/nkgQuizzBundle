<?php

namespace Nkg\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Quizz
 * @ORM\Entity
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Nkg\QuizzBundle\Entity\QuizzRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Quizz
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
     * @ORM\OneToMany(targetEntity="Question", mappedBy="quizz", cascade={"persist","remove"})
     */
    protected $questions;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdat", type="datetime")
     */
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifiedat", type="datetime")
     */
    private $modifiedat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

        /**
     * @var \DateTime
     *
     * @ORM\Column(name="startdate", type="datetime")
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enddate", type="datetime")
     */
    private $enddate;


    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    /** @ORM\PrePersist
    * @ORM\PreUpdate()
    */
     function onPrePersist()
     {
         if($this->getCreatedat() === null){
           $this->setCreatedat( new \Datetime("now") );
         }

         $this->setModifiedat( new \Datetime("now") );
     }

     /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Quizz
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set modifiedat
     *
     * @param \DateTime $modifiedat
     * @return Quizz
     */
    public function setModifiedat($modifiedat)
    {
        $this->modifiedat = $modifiedat;

        return $this;
    }

    /**
     * Get modifiedat
     *
     * @return \DateTime
     */
    public function getModifiedat()
    {
        return $this->modifiedat;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Quizz
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set startdate
     *
     * @param \DateTime $startdate
     * @return Quizz
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     * @return Quizz
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

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
     * Add questions
     *
     * @param \Nkg\QuizzBundle\Entity\Question $questions
     * @return Quizz
     */
    public function addQuestion(\Nkg\QuizzBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \Nkg\QuizzBundle\Entity\Question $questions
     */
    public function removeQuestion(\Nkg\QuizzBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
 * @return string
 */
    public function __toString()
    {
        return "".$this->getId() ?: 'n/a';
    }

}

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
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="quizz", cascade={"persist","remove"})
     */
    protected $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
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
     * @return string
     */
      public function __toString()
      {
          return $this->getLibelle() ?: 'n/a';
      }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", nullable=true, type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="propriete1", nullable=true, type="string")
     */
    private $propriete1;

    /**
     * @var string
     *
     * @ORM\Column(name="propriete2", nullable=true, type="string")
     */
    private $propriete2;

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
     * @var boolean
     *
     * @ORM\Column(name="hide", type="boolean")
     */
    private $hide;

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
     * Set libelle
     *
     * @param string $libelle
     * @return Quizz
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Quizz
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
     * Add answers
     *
     * @param \Nkg\QuizzBundle\Entity\Answer $answers
     * @return Quizz
     */
    public function addAnswer(\Nkg\QuizzBundle\Entity\Answer $answer)
    {
        $answer->setQuizz($this);
        $this->answers->add($answer);

        return $this;
    }

    /**
     * Remove answers
     *
     * @param \Nkg\QuizzBundle\Entity\Answer $answers
     */
    public function removeAnswer(\Nkg\QuizzBundle\Entity\Answer $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set propriete1
     *
     * @param string $propriete1
     * @return Quizz
     */
    public function setPropriete1($propriete1)
    {
        $this->propriete1 = $propriete1;

        return $this;
    }

    /**
     * Get propriete1
     *
     * @return string
     */
    public function getPropriete1()
    {
        return $this->propriete1;
    }

    /**
     * Set propriete2
     *
     * @param string $propriete2
     * @return Quizz
     */
    public function setPropriete2($propriete2)
    {
        $this->propriete2 = $propriete2;

        return $this;
    }

    /**
     * Get propriete2
     *
     * @return string
     */
    public function getPropriete2()
    {
        return $this->propriete2;
    }

    /**
     * Set hide
     *
     * @param boolean $hide
     * @return Quizz
     */
    public function setHide($hide)
    {
        $this->hide = $hide;

        return $this;
    }

    /**
     * Get hide
     *
     * @return boolean
     */
    public function getHide()
    {
        return $this->hide;
    }
}
<?php

namespace Nkg\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Question
 * @ORM\Entity
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Nkg\QuizzBundle\Entity\QuestionRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Question
{
    /**
     * @ORM\ManyToOne(targetEntity="Quizz", inversedBy="questions")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $quizz;

     /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="question", cascade={"persist","remove"})
     */
    protected $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
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
     * @return Question
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
     * @return Question
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
     * Set active
     *
     * @param boolean $active
     * @return Question
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
     * Add answers
     *
     * @param \Nkg\QuizzBundle\Entity\Answer $answers
     * @return Question
     */
    public function addAnswer(\Nkg\QuizzBundle\Entity\Answer $answer)
    {
        $answer->setQuestion($this);
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
     * @return Question
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
     * @return Question
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
     * @return Question
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

    /**
     * Set quizz
     *
     * @param \Nkg\QuizzBundle\Entity\Quizz $quizz
     * @return Question
     */
    public function setQuizz(\Nkg\QuizzBundle\Entity\Quizz $quizz = null)
    {
        $this->quizz = $quizz;

        return $this;
    }

    /**
     * Get quizz
     *
     * @return \Nkg\QuizzBundle\Entity\Quizz 
     */
    public function getQuizz()
    {
        return $this->quizz;
    }
}

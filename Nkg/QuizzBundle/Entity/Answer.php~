<?php

namespace Nkg\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Entity
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Nkg\QuizzBundle\Entity\AnswerRepository")
 */
class Answer
{
    /**
     * @ORM\ManyToOne(targetEntity="Quizz", inversedBy="answers")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $quizz;


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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="propriete1", type="text", nullable=true)
     */
    private $propriete1;

    /**
     * @var string
     *
     * @ORM\Column(name="propriete2", type="text", nullable=true)
     */
    private $propriete2;


    /**
     * @var boolean
     *
     * @ORM\Column(name="correct", type="boolean")
     */
    private $correct;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastvoteat", nullable=true, type="datetime")
     */
    private $lastvoteat;


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
     * @return Answer
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
     * @return Answer
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
     * Set correct
     *
     * @param boolean $correct
     * @return Answer
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;

        return $this;
    }

    /**
     * Get correct
     *
     * @return boolean
     */
    public function getCorrect()
    {
        return $this->correct;
    }

    /**
     * Set lastvoteat
     *
     * @param \DateTime $lastvoteat
     * @return Answer
     */
    public function setLastvoteat($lastvoteat)
    {
        $this->lastvoteat = $lastvoteat;

        return $this;
    }

    /**
     * Get lastvoteat
     *
     * @return \DateTime
     */
    public function getLastvoteat()
    {
        return $this->lastvoteat;
    }

    /**
     * Set quizz
     *
     * @param \Nkg\QuizzBundle\Entity\Quizz $quizz
     * @return Answer
     */
    public function setQuizz(\Nkg\QuizzBundle\Entity\Quizz $quizz)
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

    /**
     * Set propriete1
     *
     * @param string $propriete1
     * @return Answer
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
     * @return Answer
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
}

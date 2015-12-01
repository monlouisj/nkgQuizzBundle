<?php
namespace Nkg\QuizzBundle\Services;

use Symfony\Component\HttpFoundation\Session\Session;

use Doctrine\ORM\EntityManager;

use Nkg\QuizzBundle\Entity\Quizz;
use Nkg\QuizzBundle\Entity\QuizzRepository;
use Nkg\QuizzBundle\Entity\Answer;
use Nkg\QuizzBundle\Entity\AnswerRepository;

class QuizzService
{
  protected $em;

  public function __construct(EntityManager $em) {
      $this->em = $em;
  }

  //trouver 1 sondage
  public function getQuizz($quizz_id)
  {
    $quizz = $this->em
    ->getRepository('NkgQuizzBundle:Quizz')
    ->find($quizz_id);

    return $quizz;
  }


  //lister tous les quizz
  /*public function getAllQuizzs()
  {
    $quizzez = $this->em
    ->getRepository('NkgQuizzBundle:Quizz')
    ->findAll();

    return $quizzez;
  }*/

  //lister les quizz actifs par date
  public function getActiveQuizzes()
  {
    $quizzez = $this->em
    ->createQuery('SELECT p
      FROM NkgQuizzBundle:Quizz p
      WHERE p.active = 1
      AND CURRENT_TIMESTAMP() BETWEEN p.startdate AND p.enddate
      ORDER BY p.enddate DESC');

    try {
        $res = $quizzez->getResult();
        return $res;
    } catch (\Doctrine\ORM\NoResultException $e) {
        return array();
    }
  }

  //récupérer l'id d'un sondage depuis une opinion
  public function getQuizzIdFromAnswer($answer_id)
  {
    $answer = $this->em
    ->getRepository('NkgQuizzBundle:Opinion')
    ->find($answer_id);

    return $answer->getQuizz()->getId();
  }
}

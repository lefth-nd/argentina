<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Entity\TinyKangaroo;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// ...

class LuckyController extends AbstractController
{

    #[Route('/lucky/number', name: "lucky_number")]
    public function number(UserRepository $userRepo, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {


        $queryBuilder = $entityManager->createQueryBuilder();

        $count = $queryBuilder
            ->select('COUNT(u.id)')
            ->from('App\Entity\User', 'u')
            ->getQuery()
            ->getSingleScalarResult();

        $number = random_int(0, 10);
        $numbers = [1, 2, 3, 4];
        $stuff = [];

        foreach ($numbers as $n) {
            $email = $userRepo->find($n);
            $stuff[] = $email;
        }

        return $this->render('number.html.twig', [
            'number' => $number,
            'test' => $stuff,
            'count' => $count,
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\WebsiteVisitor;
use Doctrine\Persistence\ObjectManager;
use App\Repository\AccountMoveRepository;
use App\Repository\SaleOrderLineRepository;
use App\Repository\WebsiteVisitorRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(SaleOrderLineRepository $salerepo   ,AccountMoveRepository $rourou,WebsiteVisitorRepository $visit ,SaleOrderLineRepository  $prix, EntityManagerInterface $em): Response
    {
       /* $query= $em->createQueryBuilder('SELECT  sum(u.amount_total) FROM /Repository/AccountMoveRepository u WHERE u.state =:paid');
         
          $revenu = $query->getQuery();
          $r = $revenu->getSinglFRScalarResult();*/
          $data1=$em->createQuery('SELECT s.create_date FROM  App\Entity\SaleOrderLine s')->getScalarResult();
          $data=array_map('current',$data1);
          $price1=$em->createQuery('SELECT n.price_total FROM  App\Entity\SaleOrderLine n')->getScalarResult();
          $price=array_map('current',$price1);
          //valeur moyenne par  commande
          //numbre des  commande 
          $commande=$em->createQuery('SELECT count(i) FROM App\Entity\SaleOrderLine i')->getSingleScalarResult();
          //revenu 
          $reve=$em->createQuery('SELECT sum(j.price_total) FROM App\Entity\SaleOrderLine j')->getSingleScalarResult();
          //calcul moyenne
           $moyen=($reve/$commande);
        //sercle
          $draft1=$em->createQuery('SELECT k.state FROM App\Entity\AccountMove k ')->getResult();
          $draftv=$em->createQuery('SELECT COUNT (k.state) FROM App\Entity\AccountMove k GROUP by  k.state')->getResult();
          $draft=array_map('current',$draft1);
          dump($draft);
          $draft2=array_unique($draft);
          $draft3=array_map('current',$draftv);
          $por=(30/32*100);
          $po=($por-100);
          dump($por);
       //dump
       dump($draft3);
       dump($draftv);
       dump($draft2);
           dump($moyen);
          dump($data);
          dump($price);
        return $this->render('dashboard.html.twig', [ 
            'sales' =>$salerepo->findsum() ,
            'revenu' =>$rourou->findsum(),
            'vue'=>$visit->findvisitor(),
            'date'=>json_encode($data),
            'prix'=>json_encode($price),
            'vmc'=>json_encode($moyen),
            'por'=>json_encode($por),
            'po'=>json_encode($po)
           

        ]);

       # $query = $em->createQuery('SELECT u FROM e-commerce\src\SaleOederLine  u ')->getResult();
      
          #dump($query);

    }
}

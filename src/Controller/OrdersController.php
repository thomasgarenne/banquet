<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Form\OrdersType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrdersController extends AbstractController
{
    #[Route('/orders', name: 'app_orders')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $orders = new Orders;

        $form = $this->createForm(OrdersType::class, $orders);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($orders);
            $em->flush();

            return $this->redirectToRoute('app_main');
        }

        return $this->render('orders/index.html.twig', [
            'form' => $form
        ]);
    }
}

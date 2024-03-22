<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomieController extends AbstractController
{
    #[Route('/', name: 'app_homie')]
    public function index(): Response
    {
        return $this->render('homie/index.html.twig', [
            'controller_name' => 'HomieController',
        ]);
    }
}

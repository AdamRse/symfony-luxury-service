<?php

namespace App\Controller;

use App\Entity\Candidates;
use App\Entity\User;
use App\Form\CandidatesType;
use App\Repository\CandidatesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/account')]
class CandidatesController extends AbstractController
{
    #[Route('/', name: 'app_account', methods: ['GET'])]
    public function index(CandidatesRepository $candidatesRepository): Response
    {
        return $this->render('candidates/index.html.twig', [
            'candidates' => $candidatesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_account_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $candidate = new Candidates();
        $form = $this->createForm(CandidatesType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($candidate);
            $entityManager->flush();

            return $this->redirectToRoute('app_account_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidates/new.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    
    #[Route('/edit', name: 'app_account_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_homie');
        }
        /**
         * @var User user
        */
        
        $user = $this->getUser();
        $candidate = $user->getCandidates();
        $form = $this->createForm(CandidatesType::class, $candidate);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            
            return $this->redirectToRoute('app_account_index', [], Response::HTTP_SEE_OTHER);
        } 
        
        return $this->render('candidates/edit.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }
    
    #[Route('/{id}', name: 'app_account_show', methods: ['GET'])]
    public function show(Candidates $candidate): Response
    {
        return $this->render('candidates/show.html.twig', [
            'candidate' => $candidate,
        ]);
    }

    #[Route('/{id}', name: 'app_account_delete', methods: ['POST'])]
    public function delete(Request $request, Candidates $candidate, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidate->getId(), $request->request->get('_token'))) {
            $entityManager->remove($candidate);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_account_index', [], Response::HTTP_SEE_OTHER);
    }
}

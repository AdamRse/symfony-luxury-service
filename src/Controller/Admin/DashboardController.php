<?php

namespace App\Controller\Admin;

use App\Entity\Activity;
use App\Entity\Candidates;
use App\Entity\Categories;
use App\Entity\Clients;
use App\Entity\Experiences;
use App\Entity\Jobs;
use App\Entity\Nationalities;
use App\Entity\Postes;
use App\Entity\TypeJobs;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony Luxury Service');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Candidates', 'fas fa-list', Candidates::class);
        yield MenuItem::linkToCrud('Clients', 'fas fa-list', Clients::class);
        yield MenuItem::linkToCrud('Jobs', 'fas fa-list', Jobs::class);
        yield MenuItem::linkToCrud('Experiences', 'fas fa-list', Experiences::class);
        yield MenuItem::linkToCrud('Activities', 'fas fa-list', Activity::class);
        yield MenuItem::linkToCrud('Nationalities', 'fas fa-list', Nationalities::class);
        yield MenuItem::linkToCrud('Postes', 'fas fa-list', Postes::class);
        yield MenuItem::linkToCrud('Types of jobs', 'fas fa-list', TypeJobs::class);
        yield MenuItem::linkToCrud('Categories of jobs', 'fas fa-list', Categories::class);

    }
}

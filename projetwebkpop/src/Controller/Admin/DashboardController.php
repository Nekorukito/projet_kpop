<?php

namespace App\Controller\Admin;

use App\Entity\Album;
use App\Entity\Artiste;
use App\Entity\Chanson;
use App\Entity\Groupe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(GroupeCrudController::class)->generateUrl());    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gestion de Projetwebkpop');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Groupe', 'fa fa-users', Groupe::class);
        yield MenuItem::linkToCrud('Artiste', 'fa fa-user', Artiste::class);
        yield MenuItem::linkToCrud('Album', 'fa fa-music', Album::class);
        yield MenuItem::linkToCrud('Chanson', 'fa fa-music', Chanson::class);
        yield MenuItem::linkToRoute('Retour vers le site principal','fa fa-home','accueil');

    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Entity\Demande;
use App\Entity\Portofolio;
use App\Entity\SERVICE;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminDASHController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('WEB');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('SERVICE', 'fas fa-list', SERVICE::class);
        yield MenuItem::linkToCrud('Portofolio', 'fas fa-list', Portofolio::class);
        yield MenuItem::linkToCrud('Message', 'fas fa-list', Contact::class);
        yield MenuItem::linkToCrud('Demande', 'fas fa-list', Demande::class);
    }
}

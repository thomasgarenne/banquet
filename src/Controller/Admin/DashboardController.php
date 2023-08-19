<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Controller\Admin\CategoriesCrudController;
use App\Entity\Images;
use App\Entity\Orders;
use App\Entity\Plates;
use App\Entity\User;
use App\Entity\Wines;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
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
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(CategoriesCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Banquet');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Categories::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-image', Images::class);
        yield MenuItem::linkToCrud('Commandes', 'fas fa-cart-shopping', Orders::class);
        yield MenuItem::linkToCrud('Plats', 'fas fa-plate-wheat', Plates::class);
        yield MenuItem::linkToCrud('Vins', 'fas fa-wine-glass', Wines::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
    }
}

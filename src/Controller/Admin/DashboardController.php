<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use App\Entity\CompanySchedule;
use App\Entity\CompanyService;
use App\Entity\Message;
use App\Entity\Review;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private readonly RouterInterface $router
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(CarCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()->setTitle('Garage VPARROT');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Home', 'fas fa-home', $this->router->generate('app_homepage'));
        yield MenuItem::section('Gestion');
        yield MenuItem::linkToCrud('Voitures', 'fas fa-car', Car::class);
        yield MenuItem::linkToCrud('Messages', 'fas fa-message', Message::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Horaires', 'fas fa-clock', CompanySchedule::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Services', 'fas fa-wrench', CompanyService::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Avis', 'fas fa-comment', Review::class);
    }
}
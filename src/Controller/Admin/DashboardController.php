<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Console;
use App\Entity\VideoGame;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\VideoGameCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(VideoGameCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('PersonnalDB Admin');
    }

    public function configureMenuItems(): iterable
    {
        
        yield MenuItem::linkToCrud('Video Games', 'fas fa-gamepad', VideoGame::class);
        yield MenuItem::linkToCrud('Consoles', 'fas fa-computer', Console::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);
    }
}

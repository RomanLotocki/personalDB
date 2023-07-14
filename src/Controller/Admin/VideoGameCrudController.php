<?php

namespace App\Controller\Admin;

use App\Entity\VideoGame;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;

class VideoGameCrudController extends AbstractCrudController
{

    use Trait\ReadOnlyTrait;

    public static function getEntityFqcn(): string
    {
        return VideoGame::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Video Game')
            ->setEntityLabelInPlural('Video Games')
            ->setDateFormat('dd/MM/yyyy')
            ->setPageTitle('detail', fn (VideoGame $vg) => (string) $vg)
        ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnDetail(),
            ImageField::new('imageName', 'Cover')->setBasePath('assets/images/'),
            TextField::new('name'),
            TextField::new('developer')->onlyOnDetail(),
            TextField::new('publisher')->onlyOnDetail(),
            DateField::new('releaseDate'),
            TextField::new('console'),
            TextField::new('country')->onlyOnDetail(),
            TextField::new('conservation')->onlyOnDetail(),
            TextField::new('commentary')->onlyOnDetail(),
            DateField::new('acquisitionDate')->onlyOnDetail(),
            TextField::new('acquisitionPrice')->onlyOnDetail(),
            DateField::new('createdAt')->onlyOnDetail(),
            DateField::new('updatedAt')->onlyOnDetail(),
            EmailField::new('user'),
        ];
    }
   
}

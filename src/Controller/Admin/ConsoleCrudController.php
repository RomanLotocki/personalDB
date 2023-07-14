<?php

namespace App\Controller\Admin;

use App\Entity\Console;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class ConsoleCrudController extends AbstractCrudController
{

    use Trait\ReadOnlyTrait;

    public static function getEntityFqcn(): string
    {
        return Console::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Console')
            ->setEntityLabelInPlural('Consoles')
            ->setDateFormat('dd/MM/yyyy')
            ->setPageTitle('detail', fn (Console $console) => (string) $console);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnDetail(),
            TextField::new('name'),
            TextField::new('manufacturer')->onlyOnDetail(),
            DateField::new('releaseDate'),
            TextField::new('country')->onlyOnDetail(),
            TextField::new('model')->onlyOnDetail(),
            TextField::new('acquisitionPrice')->onlyOnDetail(),
            DateField::new('acquisitionDate')->onlyOnDetail(),
            TextField::new('accessories')->onlyOnDetail(),
            TextField::new('conservationAndCommentaries')->onlyOnDetail(),
            DateField::new('createdAt')->onlyOnDetail(),
            DateField::new('updatedAt')->onlyOnDetail(),
            EmailField::new('user'),


        ];
    }
}

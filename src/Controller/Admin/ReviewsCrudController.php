<?php

namespace App\Controller\Admin;

use App\Entity\Reviews;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class ReviewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reviews::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Game'),
            NumberField::new('Rate'),
            TextField::new('Text'),
            ImageField::new('Imagefile')
                ->setBasePath('public/img/recent-game/')
                ->setUploadDir('public/img/recent-game/'),
        ];
    }
}

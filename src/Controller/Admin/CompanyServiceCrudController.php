<?php

namespace App\Controller\Admin;

use App\Entity\CompanyService;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use Symfony\Component\HttpFoundation\Request;

class CompanyServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CompanyService::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Company Service')
            ->setEntityLabelInPlural('Company Services')
            ->setEntityPermission('ROLE_ADMIN');
    }
    public function createOrUpdateService(Request $request, EntityManagerInterface $entityManager)
    {
        $serviceId = $request->get('id');
        $service = $serviceId ? $entityManager->getRepository(CompanyService::class)->find($serviceId) : new CompanyService();

        $service->setName($request->request->get('name'));
        $service->setDescription($request->request->get('description'));
        $service->setPrice($request->request->get('price'));
        $service->setCompletionTime(new DateTimeImmutable('now')); // Définissez l'heure de fin

        $entityManager->persist($service);
        $entityManager->flush();
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),  // Show only on index page for better readability
            TextField::new('name', 'Nom du service'),  // Change 'title' to 'name' if that's the correct field
            TextEditorField::new('description', ' Description Service'),
            MoneyField::new('price', 'Prix')
                ->setCurrency('EUR')
                ->setStoredAsCents(false)  // Ensure to adjust according to your price storage preference
                ->setRequired(true),
            AssociationField::new('company', 'Companie')
                ->setRequired(true),  // Ensure a company must be selected when creating or editing a service
            DateTimeField::new('createdAt', 'Created At')->onlyOnDetail(),
        ];
    }

}

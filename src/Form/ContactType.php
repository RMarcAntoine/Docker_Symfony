<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                'label' => 'Name',
                'attr' => ['text' => 'form-control'],
            ])
            ->add('Email', EmailType::class, [
                'label' => 'Email',
                'attr' => ['email' => 'form-control'],
            ])
            ->add('Subject', TextType::class, [
                'label' => 'Subject',
                'attr' => ['text' => 'form-control'],
            ])
            ->add('Message', TextareaType::class, [
                'label' => 'Message',
                'attr' => ['textarea' => 'form-control'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
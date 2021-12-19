<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\Student;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\TextType;
use PharIo\Manifest\Email;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('name')
            ->add('lastName')
            ->add('surname')
            ->add('bithday',null, ['widget' => 'single_text'])
            ->add('phone' )
            ->add('city')
            ->add('adress')
            ->add('course')
            ->add('numberGroup')
            ->add('photo_uploads', FileType::class, ['label' => 'Фото', 'mapped' => false])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}

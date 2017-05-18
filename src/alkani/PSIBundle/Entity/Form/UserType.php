<?php
// src/AppBundle/Form/UserType.php
namespace alkani\PSIBundle\Entity\Form;

use alkani\PSIBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('label' => 'Vardas') )
            ->add('surname', TextType::class, array('label' => 'Pavardė'))
            ->add('email', EmailType::class, array('label' => 'El. paštas'))
            ->add('dateOfBirth', DateType::class, array(
                'years'           => range(date('Y')-100, date('Y')),
                'placeholder' => array('year' => '----', 'month' => '----', 'day' => '----' ),
                'label' => 'Gimimo data'
                ))
            ->add('personalId', TextType::class, array('label' => 'Asmens kodas'))
            ->add('phone', TextType::class, array('label' => 'Telefon nr.'))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Slaptažodis'),
                'second_options' => array('label' => 'Pakartotas slaptažodis'),
            ))
            ->add('role', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults(array(
                'data_class' => User::class,
            ));
    }
}
<?php
// src/AppBundle/Form/UserType.php
namespace alkani\PSIBundle\Entity\Form;

use Doctrine\ORM\EntityRepository;
use alkani\PSIBundle\Entity\Task;
use alkani\PSIBundle\Entity\Project;
use alkani\PSIBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label' => 'Pavadinimas') )
            ->add('description', TextareaType::class, array('label' => 'Aprašymas'))
            ->add('deadline', DateType::class, array(
                'years'           => range(date('Y'), date('Y')+10),
                'placeholder' => array('year' => '----', 'month' => '----', 'day' => '----' ),
                'label' => 'Atlikti iki'
                ))
            ->add('status', ChoiceType::class, array(
                'label'=> "Statusas",
                'choices'  => array(
                    'Nepradėta' => "not started",
                    'Progrese' => "in progress",
                    'Atlikta' => "done",
                )))
            ->add('priorities', ChoiceType::class, array(
                'label'=>"Prioritetas",
                'choices'  => array(
                    'Nesvarbu' => "0",
                    'Neskubi' => "1",
                    'Padaryti greitu metu' => "2",
                    'Labai skubu' => "3",
                )))
            ->add('fkProjectId', EntityType::class, array(
                'label'=>"Projektas",
                'class' => 'alkani\PSIBundle\Entity\Project',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->groupBy('u.id')
                        ->orderBy('u.title', 'ASC');
                },
                'choice_label' => 'title',
            ))
            ->add('fkUserId', EntityType::class, array(
                'label'=>"Darbuotojas",

                'class' => 'alkani\PSIBundle\Entity\User',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->groupBy('u.id')
                        ->orderBy('u.name', 'ASC');
                },
                'choice_label' => 'name',

//                'choice_value' => 'id',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults(array(
                'data_class' => Task::class,
            ));
    }
}
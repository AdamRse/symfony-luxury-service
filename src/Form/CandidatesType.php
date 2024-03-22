<?php

namespace App\Form;

use App\Entity\Candidates;
use App\Entity\NotesCandidates;
use App\Entity\NotesJobs;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('f_name')
            ->add('l_name')
            ->add('email')
            ->add('city')
            ->add('available')
            ->add('dt_inscription', null, [
                'widget' => 'single_text',
            ])
            ->add('address')
            ->add('has_passport')
            ->add('birthdate', null, [
                'widget' => 'single_text',
            ])
            ->add('description')
            ->add('gender')
            ->add('dt_updated', null, [
                'widget' => 'single_text',
            ])
            ->add('dt_deleted', null, [
                'widget' => 'single_text',
            ])
            ->add('notesCandidates', EntityType::class, [
                'class' => NotesCandidates::class,
                'choice_label' => 'id',
            ])
            ->add('notesJobs', EntityType::class, [
                'class' => NotesJobs::class,
                'choice_label' => 'id',
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidates::class,
        ]);
    }
}

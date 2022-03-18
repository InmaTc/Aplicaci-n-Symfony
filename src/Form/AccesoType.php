<?php

namespace App\Form;

use App\Entity\Acceso;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccesoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('horaEntrada')
            ->add('horaSalida')
            ->add('peso')
            ->add('cintaAccede')
            ->add('supervisadaPor')
            ->add('socioAccede')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Acceso::class,
        ]);
    }
}

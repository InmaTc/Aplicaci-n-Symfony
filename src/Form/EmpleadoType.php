<?php

namespace App\Form;

use App\Entity\Acceso;
use App\Entity\Empleado;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpleadoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class, [
                'label' => 'Nombre'
            ])
            ->add('apellidos', TextType::class, [
                'label' => 'Apellidos'
            ])
            ->add('dni', TextType::class, [
                'label' => 'DNI'
            ])
            ->add('email', TextType::class, [
                'label' => 'Email'
            ])
            ->add('esSupervisor')

            ->add('accesosEmpleado', EntityType::class, [
                'label' => 'Accesos del empleado',
                'class' => Acceso::class,
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Empleado::class,
        ]);
    }
}

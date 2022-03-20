<?php

namespace App\Form;

use App\Entity\Acceso;
use App\Entity\Empleado;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Validator\Constraints\NotBlank;

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

           /* ->add('accesosEmpleado', EntityType::class, [
                'label' => 'Accesos del empleado',
                'class' => Acceso::class,
                'multiple' => true
            ])
           ->add('nuevaClave', RepeatedType::class, [
               'label' => 'Nueva contraseña',
               'required' => true,
               'type' => PasswordType::class,
               'mapped' => false,
               'invalid_message' => 'No coinciden las contraseñas',
               'first_options' => [
                   'label' => 'Nueva contraseña',
                   'constraints' => [
                       new NotBlank([
                           'groups' => ['password']
                       ])
                   ]
               ],
               'second_options' => [
                   'label' => 'Repite nueva contraseña',
                   'required' => true
               ]
           ])*/
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Empleado::class
        ]);
    }
}

<?php

namespace CuteNinja\HOT\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UserType
 *
 * @package CuteNinja\HOT\UserBundle\Form\Type
 */
class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('password');

        if ($options['method'] === 'POST') {
            $builder
                ->add('username')
                ->add('referrer');
        }

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(
            [
                'data_class'      => 'CuteNinja\HOT\UserBundle\Entity\User',
                'csrf_protection' => false,
            ]
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return '';
    }
}
<?php
namespace  AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChildType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text');
        $builder->add('surname', 'text');
        $builder->add('age', 'integer');
        $builder->add('parent', 'text');
        $builder->add('email', 'email');
        $builder->add('letter', 'textarea');
        $builder->add('congratulation', 'textarea');
    }

    public function getName()
    {
        return 'child';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Child',
            'csrf_protection' => false,
        ));
    }
}
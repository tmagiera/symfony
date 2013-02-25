<?php

namespace My\TreneoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('content')
            ->add('createdDate')
            ->add('updatedDate')
            ->add('offer_id')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'My\TreneoBundle\Entity\Comment'
        ));
    }

    public function getName()
    {
        return 'my_treneobundle_commenttype';
    }
}

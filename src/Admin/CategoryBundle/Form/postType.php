<?php

namespace Admin\CategoryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class postType extends AbstractType
{

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Admin\CategoryBundle\Entity\post'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'admin_categorybundle_post';
    }
}

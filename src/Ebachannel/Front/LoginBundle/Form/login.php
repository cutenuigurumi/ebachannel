<?php

namespace Ebachannel\Front\LoginBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class categoryType extends AbstractType
{
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ebachannel\Admin\CategoryBundle\Entity\login'
        ));
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'textarea');
        $builder->add('password', 'textarea');
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'ebachannel_front_loginbundle_login';
    }
}

?>

<?php

namespace Ebachannel\Admin\CategoryBundle\Form;

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
            'data_class' => 'Ebachannel\Admin\CategoryBundle\Entity\category'
        ));
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'textarea');
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'ebachannel_admin_categorybundle_product';
    }
}

?>

<?php

namespace Ebachannel\Front\ThreadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class threadType extends AbstractType
{
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ebachannel\Admin\CategoryBundle\Entity\thread'
        ));
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text');
        $builder->add('body', 'textarea');
        $builder->add('category_id', 'hidden');
        $builder->add('updated_at', 'hidden');
        
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'ebachannel_thread_categorybundle_name';
    }
    public function getBody()
    {
        return 'ebachannel_admin_categorybundle_body';
    }
    public function getCategoryId()
    {
        return 'ebachannel_admin_categorybundle_category_id';
    }
}

?>

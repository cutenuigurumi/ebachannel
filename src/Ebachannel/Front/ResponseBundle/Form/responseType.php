<?php

namespace Ebachannel\Front\ResponseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class responseType extends AbstractType
{
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ebachannel\Admin\CategoryBundle\Entity\response'
        ));
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('user_name', 'text');
        $builder->add('user_mail', 'text');
        $builder->add('body', 'textarea');
        $builder->add('no', 'hidden');
        $builder->add('thread_id', 'hidden');
        $builder->add('created_at', 'hidden');
        
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

<?php

namespace NS\StripeBundle\Form;

use \Symfony\Component\Form\AbstractType;
use \Symfony\Component\Form\FormBuilderInterface;
use \Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of CreditCardType
 *
 * @author gnat
 */
class CreditCardType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $years = array();
        $ly    = date('Y');
        
        for($i = 0; $i <= 10; $i++)
            $years[$ly+$i] = $ly+$i;
        
        $choices = array(1 => '01', '02', '03', '04', '05', '06', '07', '08', '09',
            '10', '11', '12');

        $builder
            ->add('name', null, array('label'=>'Cardholder Name', 'attr'=>array('data-stripe'=>'name')))
            ->add('number', null, array('label'=>'Card Number', 'attr'=>array('data-stripe'=>'number')))
            ->add('expiryYear', 'choice', array('label'=>'Year', 'choices' => $years, 'attr'=>array('data-stripe'=>'exp-year')))
            ->add('expiryMonth', 'choice', array('label'=>'Month', 'choices' => $choices, 'attr'=>array('data-stripe'=>'exp-month')))
            ->add('cvv', null, array('label'=>'CVV Code', 'attr'=>array('data-stripe'=>'cvv')))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'NS\StripBundle\Entity\CreditCard'));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'CreditCardType';
    }
}
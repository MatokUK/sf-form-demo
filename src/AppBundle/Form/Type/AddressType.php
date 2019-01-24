<?php
namespace AppBundle\Form\Type;

use AppBundle\Form\Entity\Address;
use AppBundle\Repository\CountryRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    private $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('street', TextType::class, array('required' => false));
        $builder->add('number', TextType::class, array('required' => false));
        $builder->add('country', ChoiceType::class, array(
            'required' => false,
            'choices' => array_flip($this->countryRepository->getCountries()),
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => Address::class,
            )
        );
    }

    public function getBlockPrefix()
    {
        return 'my_nice_address';
    }
}
<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\OrderType;
use AppBundle\Repository\CountryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(OrderType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump('Form was submitted with data');
            dump($form->getData());
        }
        // replace this example code with whatever you need
        return $this->render('AppBundle::index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/autowire", name="autowire")
     */
    public function autowireAction(CountryRepository $countryRepository)
    {
        $countries = $countryRepository->getCountries();
        dump($countries);
        exit;
    }
}

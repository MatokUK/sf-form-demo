<?php

namespace AppBundle\Repository;

class CountryRepository
{
    public function getCountries()
    {
        return array('200' => 'Slovensko',
                     '274' => 'Czech');
    }
}
<?php

namespace AppBundle\Form\Entity;

class Order
{
    private $title;

    private $address;

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return Order
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Order
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

}
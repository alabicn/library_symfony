<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Upload
{
    /**
     * @Assert\File(    
     *        maxSize = "1M",
     *        mimeTypes = {"image/jpeg", "image/png"},
     *        mimeTypesMessage = "Please upload a valid image"
     *     )
     */
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function stripAccents($str)
    {
        return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    }
}

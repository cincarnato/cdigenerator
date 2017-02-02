<?php

namespace CdiEntity\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;
class BaseEntity extends \CdiEntity\Entity\AbstractEntity  {


     /**
     * @var \DateTime createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", name="created_at")
      * @Annotation\Exclude()
     */
    protected $createdAt;
    /**
     * @var \DateTime updatedAt
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", name="updated_at", nullable=true)
    * @Annotation\Exclude()
     */
    protected $updatedAt;


    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt) {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;
    }

   public function getId(){
       return $this->id;
   }
   
}

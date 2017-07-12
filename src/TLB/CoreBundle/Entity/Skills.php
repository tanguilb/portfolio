<?php

namespace TLB\CoreBundle\Entity;

use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Skills
 *
 * @ORM\Table(name="skills")
 * @ORM\Entity(repositoryClass="TLB\CoreBundle\Repository\SkillsRepository")
 * @Vich\Uploadable
 */
class Skills
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @Vich\UploadableField(mapping="skills_logo", fileNameProperty="logoName")
     *
     * @var File
     *
     */
    private $logoFile;

    /**
     * @ORM\Column(name="logo_name", type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $logoName;


    /**
     * @ORM\Column(name="updated_at", type="datetime")
         *
     * @var DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer")
     */
    private $value;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Skills
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Skills
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $logos
     *
     * @return Skills
     */
    public function setLogoFile(File $logos = null)
    {
        $this->logoFile = $logos;

        if($logos) {
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getLogoFile()
    {
        return $this->logoFile;
    }

    /**
     * Set logo
     *
     * @param string $logoName
     *
     * @return Skills
     */
    public function setLogoName($logoName)
    {
        $this->logoName = $logoName;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string|null
     */
    public function getLogoName()
    {
        return $this->logoName;
    }


    /**
     * Set value
     *
     * @param integer $value
     *
     * @return Skills
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }
}


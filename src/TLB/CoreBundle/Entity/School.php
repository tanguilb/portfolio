<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 08/05/17
 * Time: 09:36
 */

namespace TLB\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * School
 *
 * @ORM\Table(name="school")
 * @ORM\Entity(repositoryClass="TLB\CoreBundle\Repository\SchoolRepository")
 * @Vich\Uploadable
 */

class School
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
     * @ORM\Column(name="school_name", type="string", length=255)
     */
    private $schoolName;

    /**
     * @var string
     *
     * @ORM\Column(name="short_description", type="string", length=255)
     */
    private $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="long_description", type="text")
     */
    private $longDescritption;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="school_logo", type="string", length=255, nullable=true)
     */
    private $schoolLogo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="school_logo_updated_at", type="datetime", nullable=true)
     */
    private $schoolLogoUpdatedAt;

    /**
     * @Vich\UploadableField(mapping="school_logo", fileNameProperty="schoolLogo", size="imageSize")
     *
     * @var File
     */
    private $schoolLogoFile;

    /**
     * @ORM\Column(name="logo_size", type="integer")
     */
    private $logoSize;

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
     * Set schoolName
     *
     * @param string $schoolName
     * @return School
     */
    public function setSchoolName($schoolName)
    {
        $this->schoolName = $schoolName;

        return $this;
    }

    /**
     * Get schoolName
     *
     * @return string
     */
    public function getSchoolName()
    {
        return $this->schoolName;
    }

    /**
     * set shortDescription
     *
     * @param string $shortDescription
     * @return School
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * get shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @return string
     */
    public function getLongDescritption()
    {
        return $this->longDescritption;
    }

    /**
     * @param string $longDescritption
     */
    public function setLongDescritption($longDescritption)
    {
        $this->longDescritption = $longDescritption;
    }



    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     */
    public function getSchoolLogo()
    {
        return $this->schoolLogo;
    }

    /**
     * @param string $schoolLogo
     *
     * @return School
     */
    public function setSchoolLogo($schoolLogo)
    {
        $this->schoolLogo = $schoolLogo;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSchoolLogoUpdatedAt()
    {
        return $this->schoolLogoUpdatedAt;
    }



    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $logo
     *
     * @return School
     */
    public function setSchoolLogoFile(File $logo = null)
    {
        $this->schoolLogoFile = $logo;

        if($logo)
        {
            $this->schoolLogoUpdatedAt = new \DateTimeImmutable();
        }
        return $this;
    }

    /**
     * @return File|null
     */
    public function getSchoolLogoFile()
    {
        return $this->schoolLogoFile;
    }

    /**
     * @param integer $logoSize
     *
     * @return School
     */
    public function setLogoSize($logoSize)
    {
        $this->logoSize = $logoSize;

        return $this;
    }

    /**
     * @return integer|null
     */
    public function getLogoSize()
    {
        return $this->logoSize;
    }

}
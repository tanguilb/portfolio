<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 12/07/17
 * Time: 14:36
 */

namespace TLB\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class MyProjects
 * @package TLB\CoreBundle\Entity
 * @ORM\Table(name="my_projects")
 * @ORM\Entity(repositoryClass="TLB\CoreBundle\Repository\MyProjectsRepository")
 * @Vich\Uploadable
 */
class MyProjects
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
     * @ORM\Column(name="project_name", type="string", length=100)
     */
    private $projectName;

    /**
     * @var string
     *
     * @ORM\Column(name="tools", type="string", length=255)
     */
    private $tools;

    /**
     * @var string
     *
     * @ORM\Column(name="stint", type="text")
     */
    private $stint;

    /**
     * @Vich\UploadableField(mapping="project_image", fileNameProperty="projectImage")
     * @var File
     */
    private $projectImageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="project_image", type="string", length=255)
     */
    private $projectImage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

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
     * Set projectName
     *
     * @param string $projectName
     * @return MyProjects
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * Get projectName
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set tools
     *
     * @param string $tools
     * @return MyProjects
     */
    public function setTools($tools)
    {
        $this->tools = $tools;

        return $this;
    }

    /**
     * Get tools
     *
     * @return string
     */
    public function getTools()
    {
        return $this->tools;
    }

    /**
     * Set stint
     *
     * @param string $stint
     * @return MyProjects
     */
    public function setStint($stint)
    {
        $this->stint = $stint;

        return $this;
    }

    /**
     * Get stint
     *
     * @return $string
     */
    public function getStint()
    {
        return $this->stint;
    }

    /**
     * Set projectImageFile
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $projectImage
     *
     * @return MyProjects
     */
    public function setProjectImageFile(File $projectImage = null)
    {
        $this->projectImageFile = $projectImage;

        if($projectImage)
        {
            $this->updatedAt = new \DateTimeImmutable();
        }
        return $this;
    }

    /**
     * Get projectImageFile
     *
     * @return File|null
     */
    public function getProjectImageFile()
    {
        return $this->projectImageFile;
    }

    /**
     * Set projectImage
     *
     * @param string $projectImage
     * @return MyProjects
     */
    public function setProjectImage($projectImage)
    {
        $this->projectImage = $projectImage;

        return $this;
    }

    /**
     * Get projectImage
     *
     * @return string|null
     */
    public function getProjectImage()
    {
        return $this->projectImage;
    }


}
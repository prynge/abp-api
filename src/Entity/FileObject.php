<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\ImportController;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ApiResource(
 *     iri="http://schema.org/FileObject",
 *     normalizationContext={
 *         "groups"={"read"}
 *     },
 *     collectionOperations={
 *         "post"={
 *             "controller"=ImportController::class,
 *             "deserialize"=false,
 *             "security"="is_granted('ROLE_USER')",
 *             "validation_groups"={"Default", "file_object_create"},
 *             "openapi_context"={
 *                 "requestBody"={
 *                     "content"={
 *                         "multipart/form-data"={
 *                             "schema"={
 *                                 "type"="object",
 *                                 "properties"={
 *                                     "file"={
 *                                         "type"="string",
 *                                         "format"="binary"
 *                                     }
 *                                 }
 *                             }
 *                         }
 *                     }
 *                 }
 *             }
 *         },
 *         "get"
 *     },
 *     itemOperations={
 *         "get"
 *     }
 * )
 * @Vich\Uploadable
 */
class FileObject
{
    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    protected $id;

    /**
     * @var string|null
     * @Groups({"read"})
     * @ApiProperty(iri="http://schema.org/contentUrl")
     * 
     */
    public $contentUrl;

    /**
     * @var File|null
     *
     * @Assert\NotNull(groups={"file_object_create"})
     * @Vich\UploadableField(mapping="file_object", fileNameProperty="filePath")
     */
    public $file;

    /**
     * @var string|null
     * @Groups({"read"})
     *
     * @ORM\Column(nullable=true)
     */
    public $filePath;

    /**
     * @Groups({"read"})
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $createdat;

    /**
     * @Groups({"read"})
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $createdby;

    /**
     * @Groups({"read"})
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedat;

    /**
     * @Groups({"read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $updatedby;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $file
     */

    public function setFile(?File $file = null): self
    {
        $this->file = $file;

        if (null !== $file) {
            $this->updatedat = new \DateTimeImmutable();
        }

        return  $this;
    }


    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFilePath(?string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedat(\DateTimeInterface $createdat): self
    {
        $this->createdat = $createdat;

        return $this;
    }

    public function getCreatedby(): ?string
    {
        return $this->createdby;
    }

    public function setCreatedby(string $createdby): self
    {
        $this->createdby = $createdby;

        return $this;
    }

    public function getUpdatedat(): ?\DateTimeInterface
    {
        return $this->updatedat;
    }

    public function setUpdatedat(?\DateTimeInterface $updatedat): self
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    public function getUpdatedby(): ?string
    {
        return $this->updatedby;
    }

    public function setUpdatedby(?string $updatedby): self
    {
        $this->updatedby = $updatedby;

        return $this;
    }    
}
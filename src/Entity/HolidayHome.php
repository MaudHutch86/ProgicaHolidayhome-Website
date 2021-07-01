<?php

namespace App\Entity;


use DateTime;
use App\Form\ContactType;
use App\Entity\Amenities;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\HolidayHomeRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass=HolidayHomeRepository::class)
 * @Vich\Uploadable
 */
class HolidayHome
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     * min=5,
     * max=30,
     * minMessage = "Your first name must be at least {{ limit }} characters long",
     * maxMessage = "Your first name cannot be longer than {{ limit }} characters")
     * 
     */
    private string $name;

    /**
     * @ORM\Column(type="text")
     */
    private string $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $address;

    /**
     * @ORM\Column(type="integer")
     */
    private int $floorSpace;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int  $roomNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private int  $Bedding;

    /**
     * @ORM\Column(type="boolean", options= {"default":false })
     */
    private bool $animals;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private int $highSeasonPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private int $lowSeasonPrice;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $city;

    /**
     * @ORM\Column(type="integer")@
     * @Assert\length(
     * min=5,
     * max=5
     * )
     */
    private int $postCode;

    /**
     * @ORM\ManyToMany(targetEntity=Amenities::class, inversedBy="yes")
     */
    private object $amenities;
/**
*@var File|null
  * @Vich\UploadableField(mapping="HolidayHome_image", fileNameProperty="imageName")

 */
    private file $imageFile;
/**
 * *@var string|null
 * @ORM\Column(type="string")
 */
    private  $imageName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="float", scale = 4,precision=6)|
     */
    private  float $lat;

    /**
     * @ORM\Column(type="float",scale= 4, precision= 7)| 
     */
    private float $lng;

    

    public function __construct()
    {

$this->animals = false;
$this->created_at = new \DateTime();
$this->amenities = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getFloorSpace(): ?int
    {
        return $this->floorSpace;
    }

    public function setFloorSpace(int $floorSpace): self
    {
        $this->floorSpace = $floorSpace;

        return $this;
    }

    public function getRoomNumber(): ?int
    {
        return $this->roomNumber;
    }

    public function setRoomNumber(?int $roomNumber): self
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    public function getBedding(): ?int
    {
        return $this->Bedding;
    }

    public function setBedding(int $Bedding): self
    {
        $this->Bedding = $Bedding;

        return $this;
    }

    public function getAnimals(): ?bool
    {
        return $this->animals;
    }

    public function setAnimals(bool $animals): self
    {
        $this->animals = $animals;

        return $this;
    }

    public function getHighSeasonPrice(): ?int
    {
        return $this->highSeasonPrice;
    }

    public function setHighSeasonPrice(int $highSeasonPrice): self
    {
        $this->highSeasonPrice = $highSeasonPrice;

        return $this;
    }

    public function getLowSeasonPrice(): ?int
    {
        return $this->lowSeasonPrice;
    }

    public function setLowSeasonPrice(int $lowSeasonPrice): self
    {
        $this->lowSeasonPrice = $lowSeasonPrice;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostCode(): ?int
    {
        return $this->postCode;
    }

    public function setPostCode(int $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * @return Collection|Amenities[]
     */
    public function getAmenities(): Collection
    {
        return $this->amenities;
    }

    public function addAmenity(Amenities $amenity): self
    {
        if (!$this->amenities->contains($amenity)) {
            $this->amenities[] = $amenity;
        }

        return $this;
    }

    public function removeAmenity(Amenities $amenity): self
    {
        $this->amenities->removeElement($amenity);

        return $this;
    }

    /**
     * Get *@var File|null
     */ 
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set *@var File|null

     * @return  self
     */ 
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile){
            $this->updated_at = new \DateTime('now');
        }

        return $this;
    }

    /**
     *@var string|null
     */ 
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * 
     *@var string|null
     * @return  self
     */ 
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTime $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    
}

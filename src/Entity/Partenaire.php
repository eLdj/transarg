<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PartenaireRepository")
 */
class Partenaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $nomEntreprise;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $ninea;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $raisonSocilale;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $email;

    /**
     * @ORM\Column(type="bigint")
     */
    private $numeroCompte;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisateur", mappedBy="partenaire")
     */
    private $utilisateurs;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Compte", mappedBy="partenaire", cascade={"persist", "remove"})
     */
    private $compte;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="partenaires")
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $montantCompte;


    /**
     * @ORM\Column(type="string", length=60)
     */
    private $statut;


    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getNinea(): ?string
    {
        return $this->ninea;
    }

    public function setNinea(string $ninea): self
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getRaisonSocilale(): ?string
    {
        return $this->raisonSocilale;
    }

    public function setRaisonSocilale(string $raisonSocilale): self
    {
        $this->raisonSocilale = $raisonSocilale;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumeroCompte(): ?int
    {
        return $this->numeroCompte;
    }

    public function setNumeroCompte(int $numeroCompte): self
    {
        $this->numeroCompte = $numeroCompte;

        return $this;
    }
    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setPartenaire($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->removeElement($utilisateur);
            // set the owning side to null (unless already changed)
            if ($utilisateur->getPartenaire() === $this) {
                $utilisateur->setPartenaire(null);
            }
        }

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        // set (or unset) the owning side of the relation if necessary
        $newPartenaire = $compte === null ? null : $this;
        if ($newPartenaire !== $compte->getPartenaire()) {
            $compte->setPartenaire($newPartenaire);
        }

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getMontantCompte(): ?int
    {
        return $this->montantCompte;
    }

    public function setMontantCompte(int $montantCompte): self
    {
        $this->montantCompte = $montantCompte;

        return $this;
    }
}

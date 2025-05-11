<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use App\Dto\RenewalsDto;
use App\State\RenewalsProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'renewals')]
#[ApiResource(
    operations: [
        new Get(
            output: RenewalsDto::class
        ),
        new GetCollection(
            output: RenewalsDto::class
        ),
        new Post(
            input: RenewalsDto::class,
            output: RenewalsDto::class,
            processor: RenewalsProcessor::class
        ),
        new Put(
            input: RenewalsDto::class,
            output: RenewalsDto::class,
            processor: RenewalsProcessor::class
        ),
        new Delete(
            processor: RenewalsProcessor::class
        ),
    ],
    normalizationContext: ['groups' => ['renewals:read']],
    denormalizationContext: ['groups' => ['renewals:write']]
)]
class Renewals
{
    #[ORM\Id]
    #[ORM\Column(type: 'bigint')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $polrsk = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $polcd = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $polser = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $agency = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $motplan = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $client = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtfrom = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dtto = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $regno = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $model = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $grp = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $hpcc = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $used = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $ins = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $yr = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $excess = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $sum = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $sumsVeh = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $sumsTrl = null;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private ?float $prevRate = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $prevPrem = null;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private ?float $newRate = null;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private ?float $loading = null;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private ?float $otherInsDisc = null;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    private ?float $loading1 = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $basic = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $lUse = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $aic = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $dacc = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $alloyprem = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $fgapprem = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $repcarprem = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $xswaivprem = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $pasterprem = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $rodentprem = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $total = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $premium = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $policyFee = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $fscFee = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $payable = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $remarks = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $revisedSumInsured = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true)]
    private ?float $revisedPremium = null;

    // Getters and Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getPolrsk(): ?string
    {
        return $this->polrsk;
    }

    public function setPolrsk(?string $polrsk): self
    {
        $this->polrsk = $polrsk;
        return $this;
    }

    public function getPolcd(): ?string
    {
        return $this->polcd;
    }

    public function setPolcd(?string $polcd): self
    {
        $this->polcd = $polcd;
        return $this;
    }

    public function getPolser(): ?string
    {
        return $this->polser;
    }

    public function setPolser(?string $polser): self
    {
        $this->polser = $polser;
        return $this;
    }

    public function getAgency(): ?string
    {
        return $this->agency;
    }

    public function setAgency(?string $agency): self
    {
        $this->agency = $agency;
        return $this;
    }

    public function getMotplan(): ?string
    {
        return $this->motplan;
    }

    public function setMotplan(?string $motplan): self
    {
        $this->motplan = $motplan;
        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(?string $client): self
    {
        $this->client = $client;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDtfrom(): ?\DateTimeInterface
    {
        return $this->dtfrom;
    }

    public function setDtfrom(?\DateTimeInterface $dtfrom): self
    {
        $this->dtfrom = $dtfrom;
        return $this;
    }

    public function getDtto(): ?\DateTimeInterface
    {
        return $this->dtto;
    }

    public function setDtto(?\DateTimeInterface $dtto): self
    {
        $this->dtto = $dtto;
        return $this;
    }

    public function getRegno(): ?string
    {
        return $this->regno;
    }

    public function setRegno(?string $regno): self
    {
        $this->regno = $regno;
        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function getGrp(): ?string
    {
        return $this->grp;
    }

    public function setGrp(?string $grp): self
    {
        $this->grp = $grp;
        return $this;
    }

    public function getHpcc(): ?string
    {
        return $this->hpcc;
    }

    public function setHpcc(?string $hpcc): self
    {
        $this->hpcc = $hpcc;
        return $this;
    }

    public function getUsed(): ?string
    {
        return $this->used;
    }

    public function setUsed(?string $used): self
    {
        $this->used = $used;
        return $this;
    }

    public function getIns(): ?string
    {
        return $this->ins;
    }

    public function setIns(?string $ins): self
    {
        $this->ins = $ins;
        return $this;
    }

    public function getYr(): ?string
    {
        return $this->yr;
    }

    public function setYr(?string $yr): self
    {
        $this->yr = $yr;
        return $this;
    }

    public function getExcess(): ?float
    {
        return $this->excess;
    }

    public function setExcess(?float $excess): self
    {
        $this->excess = $excess;
        return $this;
    }

    public function getSum(): ?float
    {
        return $this->sum;
    }

    public function setSum(?float $sum): self
    {
        $this->sum = $sum;
        return $this;
    }

    public function getSumsVeh(): ?float
    {
        return $this->sumsVeh;
    }

    public function setSumsVeh(?float $sumsVeh): self
    {
        $this->sumsVeh = $sumsVeh;
        return $this;
    }

    public function getSumsTrl(): ?float
    {
        return $this->sumsTrl;
    }

    public function setSumsTrl(?float $sumsTrl): self
    {
        $this->sumsTrl = $sumsTrl;
        return $this;
    }

    public function getPrevRate(): ?float
    {
        return $this->prevRate;
    }

    public function setPrevRate(?float $prevRate): self
    {
        $this->prevRate = $prevRate;
        return $this;
    }

    public function getPrevPrem(): ?float
    {
        return $this->prevPrem;
    }

    public function setPrevPrem(?float $prevPrem): self
    {
        $this->prevPrem = $prevPrem;
        return $this;
    }

    public function getNewRate(): ?float
    {
        return $this->newRate;
    }

    public function setNewRate(?float $newRate): self
    {
        $this->newRate = $newRate;
        return $this;
    }

    public function getLoading(): ?float
    {
        return $this->loading;
    }

    public function setLoading(?float $loading): self
    {
        $this->loading = $loading;
        return $this;
    }

    public function getOtherInsDisc(): ?float
    {
        return $this->otherInsDisc;
    }

    public function setOtherInsDisc(?float $otherInsDisc): self
    {
        $this->otherInsDisc = $otherInsDisc;
        return $this;
    }

    public function getLoading1(): ?float
    {
        return $this->loading1;
    }

    public function setLoading1(?float $loading1): self
    {
        $this->loading1 = $loading1;
        return $this;
    }

    public function getBasic(): ?float
    {
        return $this->basic;
    }

    public function setBasic(?float $basic): self
    {
        $this->basic = $basic;
        return $this;
    }

    public function getLUse(): ?string
    {
        return $this->lUse;
    }

    public function setLUse(?string $lUse): self
    {
        $this->lUse = $lUse;
        return $this;
    }

    public function getAic(): ?string
    {
        return $this->aic;
    }

    public function setAic(?string $aic): self
    {
        $this->aic = $aic;
        return $this;
    }

    public function getDacc(): ?string
    {
        return $this->dacc;
    }

    public function setDacc(?string $dacc): self
    {
        $this->dacc = $dacc;
        return $this;
    }

    public function getAlloyprem(): ?float
    {
        return $this->alloyprem;
    }

    public function setAlloyprem(?float $alloyprem): self
    {
        $this->alloyprem = $alloyprem;
        return $this;
    }

    public function getFgapprem(): ?float
    {
        return $this->fgapprem;
    }

    public function setFgapprem(?float $fgapprem): self
    {
        $this->fgapprem = $fgapprem;
        return $this;
    }

    public function getRepcarprem(): ?float
    {
        return $this->repcarprem;
    }

    public function setRepcarprem(?float $repcarprem): self
    {
        $this->repcarprem = $repcarprem;
        return $this;
    }

    public function getXswaivprem(): ?float
    {
        return $this->xswaivprem;
    }

    public function setXswaivprem(?float $xswaivprem): self
    {
        $this->xswaivprem = $xswaivprem;
        return $this;
    }

    public function getPasterprem(): ?float
    {
        return $this->pasterprem;
    }

    public function setPasterprem(?float $pasterprem): self
    {
        $this->pasterprem = $pasterprem;
        return $this;
    }

    public function getRodentprem(): ?float
    {
        return $this->rodentprem;
    }

    public function setRodentprem(?float $rodentprem): self
    {
        $this->rodentprem = $rodentprem;
        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;
        return $this;
    }

    public function getPremium(): ?float
    {
        return $this->premium;
    }

    public function setPremium(?float $premium): self
    {
        $this->premium = $premium;
        return $this;
    }

    public function getPolicyFee(): ?float
    {
        return $this->policyFee;
    }

    public function setPolicyFee(?float $policyFee): self
    {
        $this->policyFee = $policyFee;
        return $this;
    }

    public function getFscFee(): ?float
    {
        return $this->fscFee;
    }

    public function setFscFee(?float $fscFee): self
    {
        $this->fscFee = $fscFee;
        return $this;
    }

    public function getPayable(): ?float
    {
        return $this->payable;
    }

    public function setPayable(?float $payable): self
    {
        $this->payable = $payable;
        return $this;
    }

    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    public function setRemarks(?string $remarks): self
    {
        $this->remarks = $remarks;
        return $this;
    }

    public function getRevisedSumInsured(): ?float
    {
        return $this->revisedSumInsured;
    }

    public function setRevisedSumInsured(?float $revisedSumInsured): self
    {
        $this->revisedSumInsured = $revisedSumInsured;
        return $this;
    }

    public function getRevisedPremium(): ?float
    {
        return $this->revisedPremium;
    }

    public function setRevisedPremium(?float $revisedPremium): self
    {
        $this->revisedPremium = $revisedPremium;
        return $this;
    }
}
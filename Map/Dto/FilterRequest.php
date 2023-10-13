<?php

namespace Licard\Map\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

class FilterRequest
{

    /**
     * @Assert\Type(type="array")
     * @Assert\All({
     *     @Assert\NotBlank,
     *     @Assert\Regex(pattern="/^[0-9a-zA-Z-_]+$/"),
     * })
     */
    protected array $fuel = [];

    /**
     * @Assert\Type(type="array")
     * @Assert\All({
     *     @Assert\NotBlank,
     *     @Assert\Regex(pattern="/^[0-9a-zA-Z-_]+$/"),
     * })
     */
    protected array $services = [];

    /**
     * @Assert\Type(type="array")
     * @Assert\All({
     *     @Assert\NotBlank,
     *     @Assert\Regex(pattern="/^[0-9a-zA-Z-_]+$/"),
     * })
     */
    protected array $typeShop = [];

    /**
     * @Assert\Type(type="array")
     * @Assert\All({
     *     @Assert\NotBlank,
     *     @Assert\Regex(pattern="/^[0-9a-zA-Z-_]+$/"),
     * })
     */
    protected array $ezs = [];

    /**
     * @Assert\Type(type="array")
     * @Assert\All({
     *     @Assert\NotBlank,
     *     @Assert\Regex(pattern="/^[0-9a-zA-Z-_]+$/"),
     * })
     */
    protected array $connector = [];

    /**
     * @Assert\Type(type="array")
     * @Assert\All({
     *     @Assert\NotBlank,
     *     @Assert\Regex(pattern="/^[0-9]+$/"),
     * })
     */
    protected array $cityId;

    public function __construct(array $data = [])
    {
        if ($data['fuel']) {
            $this->fuel = $data['fuel'];
        }

        if ($data['services']) {
            $this->services = $data['services'];
        }

        if ($data['typeShop']) {
            $this->typeShop = $data['typeShop'];
        }

        if ($data['ezs']) {
            $this->typeShop = $data['ezs'];
        }

        if ($data['connector']) {
            $this->typeShop = $data['connector'];
        }

        if ($data['cityId']) {
            $this->cityId = $data['cityId'];
        }
    }

    public static function createFromSuperGlobal(array $request): FilterRequest
    {
        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();

        $object = new static($request);

//        if ($validator->validate($object)->count()) {
//            throw new \InvalidArgumentException('Переданы некорректные параметры фильтра');
//        }

        return $object;
    }

    public function getFuel(): array
    {
        return $this->fuel;
    }

    public function setFuel(array $fuel): FilterRequest
    {
        $this->fuel = $fuel;
        return $this;
    }

    public function getAdditionalServices(): array
    {
        return $this->services;
    }

    public function setServices(array $services): FilterRequest
    {
        $this->services = $services;
        return $this;
    }

    public function getTypeShop(): array
    {
        return $this->typeShop;
    }

    public function setTypeShop(array $typeShop): FilterRequest
    {
        $this->typeShop = $typeShop;
        return $this;
    }

    public function getCity(): array
    {
        return $this->cityId;
    }

    public function setCity(array $cityId): FilterRequest
    {
        $this->cityId = $cityId;
        return $this;
    }
    public function getEzs(): array
    {
        return $this->ezs;
    }
    public function getConnector(): array
    {
        return $this->connector;
    }
}

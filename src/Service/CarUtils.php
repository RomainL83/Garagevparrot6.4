<?php

namespace App\Service;

use App\Repository\CarRepository;

class CarUtils
{
    const PRICE_RANGES = [
        ['max' => 20000],
        ['min' => 20000, 'max' => 40000],
        ['min' => 40000, 'max' => 60000],
        ['min' => 60000, 'max' => 80000],
        ['min' => 80000, 'max' => 100000],
        ['min' => 100000],
    ];

    const KM_RANGES = [
        ['max' => 10000],
        ['min' => 10000, 'max' => 50000],
        ['min' => 50000, 'max' => 100000],
        ['min' => 100000, 'max' => 150000],
        ['min' => 150000],
    ];

    public function __construct(
        private readonly CarRepository $carRepository,
    ) {
    }

    public function getAllBrands()
    {
        $brands = $this->carRepository
            ->createQueryBuilder('c')
            ->select('c.brand')
            ->distinct()
            ->getQuery()->getResult();
        return array_map(fn(array $b) => $b['brand'], $brands);
    }

    public function getAllFuels()
    {
        $fuels = $this->carRepository
            ->createQueryBuilder('c')
            ->select('c.fuel')
            ->distinct()
            ->getQuery()->getResult();
        return array_map(fn(array $f) => $f['fuel'], $fuels);
    }

    public function getAllYears()
    {
        $years = $this->carRepository
            ->createQueryBuilder('c')
            ->select('c.year')
            ->distinct()
            ->orderBy('c.year')
            ->getQuery()->getResult();
        return array_map(fn(array $y) => $y['year'], $years);
    }

    public function filter(array $filter)
    {
        $cars = $this->carRepository->createQueryBuilder('c');

        if (!empty($filter['brand'])) {
            $cars->andWhere('c.brand = :brand')->setParameter('brand', $filter['brand']);
        }
        if (!empty($filter['price'])) {
            switch ($filter['price']) {
                case 1:
                    $cars->andWhere('c.price <= :max')->setParameter('max', self::PRICE_RANGES[0]['max']);
                    break;
                case 2:
                    $cars->andWhere('c.price BETWEEN :min AND :max')
                        ->setParameter('min', self::PRICE_RANGES[1]['min'])
                        ->setParameter('max', self::PRICE_RANGES[1]['max']);
                    break;
                case 3:
                    $cars->andWhere('c.price BETWEEN :min AND :max')
                        ->setParameter('min', self::PRICE_RANGES[2]['min'])
                        ->setParameter('max', self::PRICE_RANGES[2]['max']);
                    break;
                case 4:
                    $cars->andWhere('c.price BETWEEN :min AND :max')
                        ->setParameter('min', self::PRICE_RANGES[3]['min'])
                        ->setParameter('max', self::PRICE_RANGES[3]['max']);
                    break;
                case 5:
                    $cars->andWhere('c.price BETWEEN :min AND :max')
                        ->setParameter('min', self::PRICE_RANGES[4]['min'])
                        ->setParameter('max', self::PRICE_RANGES[4]['max']);
                    break;
                case 6:
                    $cars->andWhere('c.price >= :min')->setParameter('min', self::PRICE_RANGES[4]['min']);
                    break;
            }
        }
        if (!empty($filter['fuel'])) {
            $cars->where('c.fuel = :fuel')->setParameter('fuel', $filter['fuel']);
        }
        if (!empty($filter['km'])) {
            switch ($filter['km']) {
                case 1:
                    $cars->andWhere('c.kilometer <= :max')->setParameter('max', self::KM_RANGES[0]['max']);
                    break;
                case 2:
                    $cars->andWhere('c.kilometer BETWEEN :min AND :max')
                        ->setParameter('min', self::KM_RANGES[1]['min'])
                        ->setParameter('max', self::KM_RANGES[1]['max']);
                    break;
                case 3:
                    $cars->andWhere('c.kilometer BETWEEN :min AND :max')
                        ->setParameter('min', self::KM_RANGES[2]['min'])
                        ->setParameter('max', self::KM_RANGES[2]['max']);
                    break;
                case 4:
                    $cars->andWhere('c.kilometer BETWEEN :min AND :max')
                        ->setParameter('min', self::KM_RANGES[3]['min'])
                        ->setParameter('max', self::KM_RANGES[3]['max']);
                    break;
                case 5:
                    $cars->andWhere('c.kilometer >= :min')->setParameter('max', self::KM_RANGES[4]['min']);
                    break;
            }
        }
        if (!empty($filter['year'])) {
            $cars->andWhere('c.year = :year')->setParameter('year', $filter['year']);
        }

        return $cars->getQuery()->getResult();
    }
}
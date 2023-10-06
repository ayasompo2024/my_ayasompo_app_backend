<?php
namespace App\Services;

use App\Repositories\CityRepository;
use App\Repositories\RegionRepository;
use App\Repositories\TownshipRepository;


class LocationService
{

    public function __construct(
        protected TownshipRepository $township_repository,
        protected CityRepository $city_repository,
        protected RegionRepository $region_repository
    ) {
        $this->township_repository = $township_repository;
        $this->city_repository = $city_repository;
    }


    public function townships($paginagte_number = null)
    {
        if ($paginagte_number)
            return $this->township_repository->getWithPaginate($paginagte_number);

        return $this->township_repository->getAllTownships();
    }

    public function cities($paginagte_number = null)
    {
        if ($paginagte_number)
            return $this->city_repository->getWihtPaginate($paginagte_number);

        return $this->city_repository->getAllCities();
    }
    public function regions($paginagte_number = null)
    {
        if ($paginagte_number)
            return $this->region_repository->getAll();
        return $this->region_repository->getWithPaginate($paginagte_number);
    }


    // *******  STORE ********//
    public function storeRegion($request)
    {
        return $this->region_repository->store(['name' => $request->region]);
    }

    public function storeCity($request)
    {
        return $this->city_repository->store(
            [
                'name' => $request->city,
                'region_id' => $request->region_id
            ]
        );
    }
    public function storeTownship($request)
    {
        return $this->township_repository->store([
            'name' => $request->township,
            'city_id' => $request->city_id,
            'region_id' => $request->region_id
        ]);
    }

}
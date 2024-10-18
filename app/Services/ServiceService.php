<?php

namespace App\Services;

use App\Repositories\Interface\IService;

class ServiceService
{
    private IService $service;
    public function __construct(IService $service)
    {
        $this->service = $service;
    }

    public function index($limit)
    {
        return $this->service->getAllservices($limit);
    }
    public function store($request): void
    {
        $service = [
            "name" => $request->name,
            "percent" => $request->percent
        ];
        $this->service->save($service);
    }

    public function find($service)
    {
        return $this->service->findService($service->id);
    }

    public function update($request, $service)
    {
        $service = $this->service->findService($service->id);
        $service->name = $request->name ?? $service->name;
        $service->percent = $request->percent ?? $service->percent;
        $this->service->update($service);
        return $service;
    }
    public function delete($service)
    {
        return $this->service->delete($service);
    }

}

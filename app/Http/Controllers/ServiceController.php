<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Services\ServiceService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use ResponseTrait;
    private ServiceService $serviceService;
    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->returnData(__("messages.All Services"),200,$this->serviceService->index($request->get("per_page",10)));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $this->serviceService->store($request);
        return $this->success(__("messages.Service Created"),201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return $this->returnData(__("messages.Service Found"),200,$this->serviceService->find($service));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        return $this->returnData(__("messages.Service Updated"),200,$this->serviceService->update($request,$service));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $this->serviceService->delete($service);
        return $this->success(__("messages.Service Deleted"),200);
    }
}

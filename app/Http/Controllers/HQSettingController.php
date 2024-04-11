<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHQSettingRequest;
use App\Http\Requests\UpdateHQSettingRequest;
use App\Interfaces\HQSettingRepositoryInterface;
use App\Models\HQSetting;

class HQSettingController extends Controller
{
    private $repository;
    
    public function __construct(HQSettingRepositoryInterface $repository) {
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHQSettingRequest $request)
    {
        $this->repository->create($request->all());
        
        return redirect()->back()->with('message', __('hqsettings_updated'));
    }

    /**
     * Display the specified resource.
     */
    public function show(HQSetting $hQSetting){}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HQSetting $hQSetting)
    {
        return \Inertia\Inertia::render('HQSettings/HQSettingsEdit', [
            'hq_setting' => $hQSetting,
            'can' => $this->_getRoles(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHQSettingRequest $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
    
    public function restore(int $id) {
        //
    }
    
    private function _getRoles() {
        //
        return [
            'list' => Auth::user()->can('hq_setting list'),
            'create' => Auth::user()->can('hq_setting create'),
            'edit' => Auth::user()->can('hq_setting edit'),
            'delete' => Auth::user()->can('hq_setting delete'),
            'restore' => Auth::user()->can('hq_setting restore'),
        ];
    }
}

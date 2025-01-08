<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\DestroyRequest;
use App\Http\Requests\Admin\Setting\EditRequest;
use App\Http\Requests\Admin\Setting\IndexRequest;
use App\Http\Requests\Admin\Setting\SaveRequest;
use App\Http\Requests\Admin\Setting\StoreRequest;
use App\Http\Requests\Admin\Setting\UpdateRequest;
use App\Models\Setting;
use App\Repositories\SettingRepository;

class SettingController extends Controller
{
    public function __construct(private SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function index(IndexRequest $request)
    {
        $settings=$this->settingRepository->get();
        return view('admin.settings.index',compact('settings'));
    }

    public function store(StoreRequest $request)
    {
        return view('admin.settings.form');
    }
    public function save(SaveRequest $request)
    {
        $setting = $this->settingRepository->store([
            'key'=>$request->get('key'),
            'value'=>$request->get('value'),
        ]);
        if (!$setting){
            return redirect()->back()->with($this->sendAlert('danger', 'Error', 'Setting key already exists'));
        }
        return redirect()->route('settings.index')->with($this->sendAlert('success', 'Success', 'Setting added successfully'));

    }
    public function  edit(EditRequest $request,Setting $setting)
    {
        return view('admin.settings.form',compact('setting'));
    }
    public function update(UpdateRequest $request,Setting $setting)
    {
        $data=[
            'key'=>$request->get('key'),
            'value'=>$request->get('value')
        ];
        $setting = $this->settingRepository->update($data,$setting);
        if (!$setting){
            return redirect()->back()->with($this->sendAlert('danger', 'Error', 'Setting key already exists'));
        }
        return redirect()->route('settings.index')->with($this->sendAlert('success', 'Success', 'Setting updated successfully'));
    }
    public function destroy(DestroyRequest $request,Setting $setting)
    {
        $this->settingRepository->destroy($setting);
        return redirect()->route('settings.index')->with($this->sendAlert('success', 'Success', 'Setting delete successfully'));
    }
}

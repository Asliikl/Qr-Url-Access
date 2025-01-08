<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\DestroyRequest;
use App\Http\Requests\Admin\Admin\EditRequest;
use App\Http\Requests\Admin\Admin\IndexRequest;
use App\Http\Requests\Admin\Admin\SaveRequest;
use App\Http\Requests\Admin\Admin\StoreRequest;
use App\Http\Requests\Admin\Admin\UpdateRequest;
use App\Models\Admin;
use App\Repositories\AdminRepository;

class AdminController extends Controller
{
    public function __construct(private AdminRepository $adminRepository)
    {
        $this->adminRepository=$adminRepository;
    }

    public function index(IndexRequest $request)
    {
        $admins = $this->adminRepository->get([], true);
        return view('admin.admins.index', compact('admins'));
    }

    public function store(StoreRequest $request)
    {
        return view('admin.admins.form');
    }

    public function save(SaveRequest $request){
        $this->adminRepository->store([
            'name'=>$request->get('name'),
            'surname'=>$request->get('surname'),
            'email'=>$request->get('email'),
            'password' => \Hash::make($request->get('password')),
        ]);
        return redirect()->route('admins.index')->with($this->sendAlert('success','Success','Admin added successfully'));
    }


    public function edit(EditRequest $request, Admin $admin)
    {
        return view('admin.admins.form', compact('admin'));
    }

    public function destroy(DestroyRequest $request, Admin $admin)
    {
        $this->adminRepository->destroy($admin);
        return redirect()->route('admins.index')->with($this->sendAlert('success','Success','Admin added successfully'));
    }

    public function update(UpdateRequest $request,Admin $admin)
    {
        $data=[
            'name'=>$request->get('name'),
            'surname'=>$request->get('surname'),
            'email'=>$request->get('email'),
        ];
        if ($request->get('password')){
            $data['password'] = \Hash::make($request->get('password'));
        }
       $this->adminRepository->update($data,$admin);
        return redirect()->route('admins.index')->with($this->sendAlert('success','Success','Admin updated successfully'));
    }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function logout(){
        (new AdminRepository())->logout();
        return redirect()->route('admin.login')->with($this->sendAlert('success','Success','Logged out successfully'));
    }

    public function loginPost(Request $request)
    {
        $checkUser = (new AdminRepository())->get([
            'email' => $request->get('email')
        ])->first();
        if($checkUser && \Hash::check($request->get('password'),$checkUser->password)){
            session()->put('admin',$checkUser);
            return redirect()->route('admin.home')->with($this->sendAlert('success','Success','Logged in successfully'));
        }
        else{
            return redirect()->route('admin.login')->with($this->sendAlert('error','Error','Wrong email or password'));
        }
    }
}

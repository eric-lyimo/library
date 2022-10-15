<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Roles;
use App\Models\UserRoles;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
            //    dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function index(Request $request){
        if (! Gate::allows('admin')) {
            abort(403);
        }
        $users = User::with('roles')->get();

        $roles = Roles::all();
        return view('users.list',compact('users','roles'));
    }

    protected function register(Request $request)
    {
        $user =new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
        $user->save();        

        $user_role =new UserRoles();
            $user_role->user_id = $user->id;
            $user_role->role_id=1;
            $user_role->save(); 
        return redirect('/login');
    }

    protected function registration(){
        return view('auth.register');
    }

    protected function update(Request $request){
        if (! Gate::allows('admin')) {
            abort(403);
        }
        $id = $request->input('key');
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
        ]);

        User::where('id',$id)->update([
            'name'=>$validated['name'],
            'email'=>$validated['email']
        ]);

        $user_role =new UserRoles();

        $user_role::where('user_id',$id)->update([
            'role_id'=>$validated['role']
        ]);
        return back()->with('sucess','user was updated');
    }

    protected function destroy(Request $request){
        if (! Gate::allows('admin')) {
            abort(403);
        }
        $id = $request->input('key');
        User::where('id',$id)->delete();
        return back()->with('sucess','user deleted successfuly');
    }
}

<?php

namespace App\Http\Controllers\Auth;

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

class RegisterController extends Controller
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
    protected function register(Request $request)
    {
        // dd($data);
        if (! (Gate::allows('admin'))) {
            abort(403);
        }
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        UserRoles::create([
            'user_id'=>$user->id,
            'role_id'=>$request->role
        ]);
        
        return redirect('/login');
    }

    protected function index(){
        if (! (Gate::allows('admin'))) {
            abort(403);
        }
        $users = User::with('roles')->get();
        $roles = Roles::all();
        return view('users.user', compact('users','roles'));
    }

    protected function show(){
        $roles = Roles::all();
        return view('users.roles', compact('roles'));
    }

    protected function store(Request $request){
        Roles::create([
            'name'=>$request->name
        ]);
        return back()->with('sucess','A new role was successfully created');
    }

    protected function update(Request $request){
        $id = $request->input('key');
        Roles::where('id',$id)->update(['name'=>$request->name]);
        return back()->with('sucess','A role was updated');
    }
    protected function destroy(Request $request){
        $id = $request->input('key');
        Roles::where('id',$id)->delete();
        return back()->with('sucess','A new role was successfully created');
    }
}

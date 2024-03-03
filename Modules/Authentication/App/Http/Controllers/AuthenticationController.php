<?php

namespace Modules\Authentication\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     return view('authentication::index');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     return view('authentication::create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request): RedirectResponse
    // {
    //     //
    // }

    // /**
    //  * Show the specified resource.
    //  */
    // public function show($id)
    // {
    //     return view('authentication::show');
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit($id)
    // {
    //     return view('authentication::edit');
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, $id): RedirectResponse
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy($id)
    // {
    //     //
    // }

    public function login()
    {
        return view('authentication::login');
    }

    public function signin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $current = User::where('email', $credentials['email'])->with('roles')->firstOrFail();
        if ($current) {
            if (Hash::check($credentials['password'], $current->password)) {

                $currentRoles = $current->roles()->get();

                foreach ($currentRoles as $roleName) {
                    Auth::shouldUse($roleName->name);

                    if (Auth::attempt($credentials)) {
                        $request->session()->regenerate();
                    }
                }
                foreach ($currentRoles as $role) {
                    if ($role->name === 'admin') {
                        return redirect()->intended('admin/dashboard');
                    }
                }
                foreach ($currentRoles as $role) {
                    if ($role->name === 'client') {
                        return redirect()->intended('dashboard');
                    }
                }
            } else {

                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');
            }
        }
    }



    public function testadmin()
    {
        return 'ok admin';
    }
    public function test()
    {
        return 'ok';
    }

    public function register()
    {
        return view('authentication::register');
    }

    public function signup(Request $request)
    {
        $data = $request->post();


        $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'username' => 'required|string|unique:users|max:50|min:10',
            'email' => 'required|string|email|unique:users|max:50|min:10',
            'password' => 'required|string|max:50|min:10',
            'confirm-password' => 'required|string|same:password|max:50|min:10',
        ]);


        User::create($data);


        return back()->with('status', 'Success: Now you can start your session');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserFormRequest;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['show','logout']]);
        $this->middleware('guest', ['only' => ['create','store']]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        auth()->login($user);

        return redirect()->route('home')->with('message', 'User created and logged in');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show')->with('user', auth()->user());
    }

    //Show login page
    public function login()
    {
        return view('users.login');
    }

    //Authenticate user
    public function authenticate(Request $request)
    {
        $remember = $request->remember;
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($formFields, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('home')->with('message', 'Succesfully logged in');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    //Logout User
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('message', 'User logged out');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $data = User::findOrFail($id);

        if($data->name !== $request->name) {
            $request->validate([
                'name' => ['required', Rule::unique('users', 'name'), 'min:2'],
            ]);
            $data->name = $request->name;
        } 
        if ($request->old_password !== null && $request->new_password !== null) {
            if (!Hash::check($request->old_password, $data->password)) {
                return redirect()->route('users.show',  auth()->user())->withErrors(['message' => 'Credentials do not match'] );
            } 
            $request->validate([
                'new_password' => ['required', Password::min(8)],
            ]);
            $data->password = $request->new_password;
        }

        $data->save();
        return redirect()->route('users.show', auth()->user())->with('message', 'Account details succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //needs to delete all owned posts of user
        $user = User::find($id);
        $user->delete();
        return redirect()->route('home');
    }
}
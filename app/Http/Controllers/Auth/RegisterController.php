<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Instituciones;
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

    use RegistersUsers;

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
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request  $request)
    {
        $request ->validate([
            'name' => 'required',
            'email' => 'required|email',
            'curp'=> 'required',
            'institucion' => 'required',
            'programa' => 'required',
            'password' => 'required',
            'archivoCurp' => 'required|mimes:pdf|max:2048',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

<<<<<<< Updated upstream
        //$instituciones = Instituciones::all();
        //return view('register', compact('instituciones'));
=======
<<<<<<< HEAD
        $profileData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'curp' => $request->input('curp'),
            'institucion' => $request->input('institucion'),
            'programa' => $request->input('programa'),
            'password' => bcrypt($request->input('password')),
        ];

        $profile = User::create($profileData);

        if ($request->hasFile('archivoCurp')) {
            $pdfPath = $request->file('archivoCurp')->store('archivos_curp', 'public');
            $profile->update(['archivoCurp' => $pdfPath]);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profiles', 'public');
            $profile->update(['image_path' => $imagePath]);
        }

        return redirect()->route('profiles.create')->with('success', 'Perfil creado exitosamente!');
=======
        //$instituciones = Instituciones::all();
        //return view('register', compact('instituciones'));
>>>>>>> 0cd4144cd04a523d2bde5683ef461413541383f0
>>>>>>> Stashed changes
    }

    
}

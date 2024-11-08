<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmacionCorreo;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistroAdminController extends Controller
{

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
        return view('auth.admin-register');
    }

    public function store(Request  $request)
    {
        $request ->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'curp' => ['required', 'string', 'max:18', function ($attribute, $value, $fail) {
                $existeCurp = User::where('curp', $value)->exists();
                if ($existeCurp) {
                    $fail('El CURP ingresado ya existe en la base de datos.');
                }
            }],
            'institucion' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'archivoCurp' => 'required|mimes:pdf|max:2048',
        ]);

        $profileData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'curp' => $request->input('curp'),
            'institucion' => $request->input('institucion'),
            'programa' => '',
            'password' => bcrypt($request->input('password')),
            'tipo' => 'adm2',
            'fullacces' => 'yes',
        ];

        $profile = User::create($profileData);

        if ($request->hasFile('archivoCurp')) {
            $pdfPath = $request->file('archivoCurp');
            $pdfPath->move(public_path().'/documentos-users/perfil/archivos_curp',$pdfPath->getClientOriginalName());
            $profile->archivoCurp=$pdfPath->getClientOriginalName();
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $imagePath->move(public_path().'/documentos-users/perfil/profiles', $imagePath->getClientOriginalName());
            $profile->image_path=$imagePath->getClientOriginalName();
        }

        $profile->save();
        
        return view('auth.login');

    }

    public function showFilesById($id)
    {
        $profile = User::find($id);

        if (!$profile) {
            return redirect()->route('auth.index')->with('error', 'Perfil no encontrado');
        }

        return view('auth.showFilesById', compact('profile'));
    }
    protected function registered(Request $request, $user)
    {
        Mail::to($user->email)->send(new ConfirmacionCorreo($user));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('auth.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->curp = $request->input('curp');
        $user->email = $request->input('email');
        if ($request->has('institucion')) {
            $user->institucion = $request->input('institucion');
        }
        //$user->institucion = $request->input('institucion');
        $user->programa = $request->input('programa');
        $user->save();
        return redirect()->route('home.index');
    }
}

<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\emailVerificacion;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class CorreoverController extends Controller
{
    public function VerificarCorreo()
{
    $user = Auth::user();

    // Verificar si el usuario está autenticado
    if ($user) {
        $correo = new emailVerificacion($user); // Pasar $user al constructor del correo
        Mail::to($user->email)->send($correo);
    } else {
        // Manejar el caso en el que no hay usuario autenticado
        // Puede redirigir a la página de inicio de sesión o mostrar un mensaje de error
        return redirect()->route('login')->with('error', 'Debe iniciar sesión para verificar el correo electrónico.');
    }

    return redirect('/home')->with('correo', 'Correo verificado correctamente.');}
    


public function aprobarVerificacionDeCorreo($userId)
{
    $user = User::find($userId);

    if ($user) {
        // Cambiar el atributo de verificación
        $user->tipo = "autenticado";
        $user->save();
        return view('home')->with('success', 'Correo verificado correctamente.');
    } else {
        return redirect()->route('home')->with('error', 'No se encontró el usuario.');
    }
}
}


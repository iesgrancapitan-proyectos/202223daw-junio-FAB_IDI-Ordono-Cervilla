<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;


class AuthController extends BaseController
{
    //Permite que el usuario pueda pedir una nueva contraseña
    public function regenerarContrasena(Request $request)
    {
        $email = $request->input('email');

        $usuario = DB::table('users')->where('email', $email)->first();

        if ($usuario) {

            //Comprueba si la cuenta está activa
            if ($usuario->activo == '0') {
                return back()->with('error', 'El usuario no está activo. Contacta con el administrador para activar tu cuenta.');
            }

            //Genera una contraseña aleatoria y la encripta
            $randomPassword = $this->generarPasswordAleatoria();
            $passwordEncriptada = bcrypt($randomPassword);

            //Actualiza la contraseña en la base de datos
            DB::table('users')->where('email', $email)->update(['password' => $passwordEncriptada]);

            //Envía un email con la nueva contraseña
            $transport = new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls');
            $transport->setUsername('viorbe20@gmail.com');
            $transport->setPassword('qgeccmuaivcojphv');

            $mailer = new Swift_Mailer($transport);

            $message = new Swift_Message('Generación de nueva contraseña Red FAB-IDI');
            $message->setFrom(['viorbe20@gmail.com' => 'Fab Idi']);
            $message->setTo(['a20orbevi@iesgrancapitan.org' => $usuario->nombre, $usuario->email => $usuario->nombre]);
            $message->setBody(view('emails.nueva-contrasena', ['usuario' => $usuario, 'randomPassword' => $randomPassword])->render(), 'text/html');
            $mailer->send($message);

            return view('auth.login')->with('success', 'Se ha enviado un email con la nueva contraseña.');
        } else {
            return back()->with('error', 'El email no existe.');
        }
        
    }

    public function olvidarContrasena()
    {
        return view('auth/regenerar-contrasena');
    }

    public function inicioAdmin()
    {
        return view('admin/inicio-admin');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginPost(Request $request)
    {

        if (empty($request->input('email')) || empty($request->input('password'))){
            return back()->with('error', 'Los campos son obligatorios.');
        }

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {

            $user = DB::table('users')->where('email', $request->email)->first();

            if ($user->activo == '0') {
                auth()->logout();
                return back()->with('error', 'El usuario no está activo. Contacta con el administrador para activar tu cuenta.');
            }

            $perfil_id = DB::table('users')->where('email', $request->email)->value('perfil_id');
            $perfil = DB::table('perfiles')->where('id', $perfil_id)->value('perfil');
            session(['perfil' => $perfil]);

            if ($perfil == 'admin') {
                return redirect('/inicio-admin');
            } else {
                return redirect('/');
            }
        }

        return back()->with('error', 'Los datos no son correctos.');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}

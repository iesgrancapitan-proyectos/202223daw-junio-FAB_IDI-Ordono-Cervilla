<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioMentor;
use App\Mail\MensajeRecibido;
use App\Mail\ContactFormMail;
use GuzzleHttp\Client;


class MentorController extends Controller
{


    public function formularioMentor(Request $request)
    {
        $data = $request->all();
    
        // Enviar los datos del formulario por correo electrónico
        $client = new Client();
        $response = $client->post('https://api.mailgun.net/v3/sandbox2795e2b0861d41c6bb588617570240b5.mailgun.org/messages', [
            'auth' => ['api', 'key-234a2c62b7ade5b7619c631016c39560'],
            'form_params' => [
                'from' => $data['email'],
                'to' => 'viorbe20@gmail.com',
                'subject' => 'Mensaje de contacto',
                'html' => view('emails.contact-form-data', compact('data'))->render(),
            ],
        ]);
    
        // Verificar el estado de la respuesta
        if ($response->getStatusCode() == 200) {
            // Éxito al enviar el correo electrónico
            return redirect()->back()->with('success', '¡El correo de contacto se ha enviado con éxito!');
        } else {
            // Error al enviar el correo electrónico
            return redirect()->back()->with('error', 'Error al enviar el correo de contacto. Por favor, inténtalo de nuevo.');
        }
    }
}

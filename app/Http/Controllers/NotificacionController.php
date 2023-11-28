<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // sail artisan make:controller NotificacionController --invokable solo para que cree con un metodo
    public function __invoke(Request $request)
    {
        //se obtiene las notificaciones
        $notificaciones = auth()->user()->unreadNotifications;
        //se limpia las notificaciones  markAsRead va marcar las notificaciones leidas como no leidas
        auth()->user()->unreadNotifications->markAsRead();


        return view('Notificaciones.index',[
            'notificaciones' => $notificaciones
        ]);
    }
}

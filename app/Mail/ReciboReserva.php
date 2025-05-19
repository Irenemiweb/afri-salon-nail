<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReciboReserva extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $recibo;
    public $datosRequest;
    public $serviciosVendidos;
    public $descuentos;
    public function __construct($recibo, $datosRequest, $serviciosVendidos)
    {
        $this->recibo = $recibo;
        $this->datosRequest = $datosRequest;
        $this->serviciosVendidos = $serviciosVendidos;
       // Calcular la suma de los descuentos
    $totalDescuentoServicios = $serviciosVendidos->sum(function($servicioVendido) {
        return $servicioVendido->descuento_importe; // Sumar los descuentos de los servicios vendidos
    });

    // Sumar el descuento total del recibo
    $totalDescuento = $totalDescuentoServicios + $recibo->descuento_total;

    // Asignar la suma total a la propiedad descuentos
    $this->descuentos = $totalDescuento;
    }

    public function build()
    {
        return $this->view('emails.email-recibo-cliente') // Vista que se usará para el correo
                ->subject('Recibo de tu Reserva') // Asunto del correo
                ->attach(storage_path('app/public/image_emails/cavecera_email.png'), [
                    'as' => 'cavecera_email.png',
                    'mime' => 'image/png',
                ]) // Aquí cerramos el paréntesis de attach()
                ->with([
                    'recibo' => $this->recibo,
                    'datosRequest' => $this->datosRequest, // Aquí corregí 'datosRequiest' por 'datosRequest'
                    'serviciosVendidos' => $this->serviciosVendidos,
                    'descuentos' => $this->descuentos,
                ]);
    }
    // /**
    //  * Get the message envelope.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Envelope
    //  */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Recibo Reserva',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Content
    //  */
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array
    //  */
    // public function attachments()
    // {
    //     return [];
    // }
}

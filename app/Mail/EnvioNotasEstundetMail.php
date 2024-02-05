<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioNotasEstundetMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data_email;

    public function __construct($data_email)
    {
        $this->data_email = $data_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('serviciocomunitario.nucleolara@gmail.com')
                    ->subject('Notas de los estudiantes')
                    ->view('mail.notas-student.templete-mail-notas', [
                        'data_email' => $this->data_email,
                    ]);
    }
}

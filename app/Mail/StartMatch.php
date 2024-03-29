<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StartMatch extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Match Start!')->view('emails.start'); // Используйте шаблон Blade для письма
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Enquiry;

class UploadsFile extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
           
            return $this->view('emails.myTestMail')
                    ->subject('Paper Regarding Hi-Techpark')
                    ->attach(public_path('uploads/files/BTL---Bangabandhu Hi-Tech City; Block-III.pdf'), [
                         'as' => 'BTL---Bangabandhu Hi-Tech City; Block-III.pdf',
                         'mime' => 'application/pdf',
                    ])
                    ->attach(public_path('uploads/files/Bangladesh TechnoSity Ltd.png'), [
                         'as' => 'Bangladesh TechnoSity Ltd.png',
                         'mime' => 'application/pdf',
                    ]);

    }
}

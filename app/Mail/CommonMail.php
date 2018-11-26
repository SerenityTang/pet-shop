<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommonMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $subject;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $url, $subject)
    {
        $this->user = $user;
        $this->url = $url;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pc.core.email.common_email')->with(['user' => $this->user, 'url' => $this->url, 'subject' => $this->subject])->subject($this->subject);
    }
}

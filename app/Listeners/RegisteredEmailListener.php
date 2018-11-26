<?php

namespace App\Listeners;

use App\Services\Mail\CommonSendMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisteredEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = $event->user;
        $subject = config('global.email.register_subject');
        $remarks = config('global.email.register_remarks');
        CommonSendMail::sendMail($user, $subject, $remarks);
    }
}

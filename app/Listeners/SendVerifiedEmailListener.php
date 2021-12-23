<?php

namespace App\Listeners;

use App\Events\RegisterEvent;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendVerifiedEmailListener
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param RegisterEvent $event
     * @return void
     */
    public function handle(RegisterEvent $event)
    {
        if (! $event->user->hasVerifiedEmail()) {
            Mail::to($event->user)->send(new VerifyEmail($event->user));
            session()->flash('success', '验证已发送到邮箱');
        }
    }
}

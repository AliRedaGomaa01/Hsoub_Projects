<?php

namespace App\Jobs;

use App\Mail\Emails;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $recipients, public String $esubject, public String $emessage)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->recipients as $key => $recipient) {
            if (isset($recipient)) {
                $slug = $recipient->slug ?? "";
                $recipient = $recipient->email ?? "";
                Mail::to($recipient)->send(new Emails($slug, $this->esubject, $this->emessage));
            }
        };
    }
}

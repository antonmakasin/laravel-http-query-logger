<?php

namespace Oskingv\HttpQueryLogger\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    private $fields=[];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $fields)
    {
        $this->fields['fields'] = $fields;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Http Query Logger: Notification')->view('http-query-logger::mail.notification', $this->fields);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Visitor;

class VisitorReplyMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $visitor;

    /**
     * Create a new message instance.
     */
    public function __construct(Visitor $visitor)
    {
        $this->visitor = $visitor;
    }

     public function build()
    {
        return $this->from('no-reply@kyappointments.test', 'KY Appointment System')
                    ->subject('Thank you for your inquiry')
                    ->markdown('emails.visitor.reply')
                    ->with([
                        'title' => $this->visitor->title,
                        'name' => $this->visitor->name,
                        'desc' => $this->visitor->desc,
                        'app_date' => $this->visitor->app_date,
                        'app_timeFrom' => $this->visitor->app_timeFrom,
                        'app_timeTo' => $this->visitor->app_timeTo
                    ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Visitor Reply Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.visitor.reply',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

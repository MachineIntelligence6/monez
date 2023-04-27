<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Newslettermail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $body;
    public $imageAttachments;
    public $videoAttachments;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData, $body, $imageAttachments, $videoAttachments)
    {
        $this->mailData = $mailData;
        $this->body = $body;
        $this->imageAttachments = $imageAttachments;
        $this->videoAttachments = $videoAttachments;
    }
    public function build()
    {
        $mail = $this->from('no-reply@example.com', 'No Reply')
            ->subject($this->mailData['subject'])
            ->view('settings.testemail', $this->mailData);
            // ->html($this->body);

        foreach ($this->imageAttachments as $attachment) {
            $mail->attachData($attachment['data'], $attachment['name'], [
                'mime' => 'image/' . pathinfo($attachment['name'], PATHINFO_EXTENSION),
            ]);
        }

        foreach ($this->videoAttachments as $attachment) {
            $mail->attachData($attachment['data'], $attachment['name'], [
                'mime' => 'video/' . pathinfo($attachment['name'], PATHINFO_EXTENSION),
            ]);
        }

        // dd($mail,$this->body);
        return $mail;

        // return $this->subject($this->mailData['subject'])->view('settings.testemail', $this->mailData);

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Newsletter',
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

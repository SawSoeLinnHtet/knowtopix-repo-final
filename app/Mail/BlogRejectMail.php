<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlogRejectMail extends Mailable
{
    use Queueable, SerializesModels;

    public $blog;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reject_url = URL::signedRoute(
            'site.blogs.reject',
            [
                'blog_slug' => $this->blog->slug,
                'user_id' => $this->blog->user_id
            ]
        );

        return $this->subject('Your Blog Post Has Been rejected')
        ->from(env('MAIL_NAME'))
        ->view(
            'email.blogs.reject-create',
            [
                'reject_url' => $reject_url,
                'blog' => $this->blog
            ]
        );
    }
}

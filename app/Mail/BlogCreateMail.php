<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlogCreateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $blog;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Blog $blog)
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
        $success_url = URL::signedRoute(
            'site.blogs.accept.verify',
            [
                'blog_slug' => $this->blog->slug,
                'user_id' => $this->blog->user_id
            ]
        );

        return $this->subject('Your Blog Post Has Been Accepted')
        ->from(env('MAIL_NAME'))
        ->view(
            'email.blogs.success-create',
            [
                'success_url' => $success_url,
                'blog' => $this->blog
            ]
        );
    }
}

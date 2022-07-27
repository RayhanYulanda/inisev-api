<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailSubscriber extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->to($this->user->email)
            ->subject("You've subscribe the website ".$this->post->website->domain)
            ->html("You got an post from subscribed website: ".$this->post->title)
            ->html("<a href='".$this->post->website->domain."/".$this->post->slug."'>Click here</a> to see the post");
    }
}

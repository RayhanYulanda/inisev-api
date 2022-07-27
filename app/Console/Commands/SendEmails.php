<?php

namespace App\Console\Commands;

use App\Mail\EmailSubscriber;
use App\Models\Post;
use App\Models\SendEmail;
use App\Models\User;
use App\Models\Website;
use Dflydev\DotAccessData\Data;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {user} {post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a post email to a user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::find($this->argument('user'));
        $post = Post::find($this->argument('post'));

        //Check if stories has been sent or not
        $userPost = $user->sendEmailPost->first();
        if (empty($userPost)){
            $sendMail = SendEmail::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'status' => SendEmail::PENDING,
            ]);

            Mail::to($user->email)->send(new EmailSubscriber($user, $post));
            SendEmail::whereUserId($user->id)->wherePostId($post->id)->update(['status'=>SendEmail::SENT]);
        }
    }
}

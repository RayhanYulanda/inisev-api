<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use Illuminate\Console\Command;

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
        //Check if sent or not
        $user = User::find($this->argument('user'));
        $post = Post::find($this->argument('post'));

        //Check if stories has been sent or not
    }
}

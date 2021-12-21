<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UserLoginCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:check' ;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'user is checked';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::query()->where('last_login', '<=',Carbon::now()->addRealDays(-5)->format('Y-m-d'))
            ->update(['status'=>'suspended']);
        echo 'All users is checked';
    }
}

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
        User::query()->where('last_login', '>=',Carbon::now()->addRealDays(-10)->format('Y-m-d'))->chunk(50,function ($users){
            foreach ($users as $user){
                $last_login = $user->last_login;
                $date = Carbon::create($last_login);
                if ($date->diffInDays(Carbon::now()) >= 5) {
                    $user->status = 'suspended';
                    $user->update();
                }else{
                    $user->status = 'active';
                    $user->update();
                }
            }
            echo 'All users is checked';
        });
    }
}

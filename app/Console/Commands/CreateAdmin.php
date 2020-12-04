<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Roles\Contracts\UserRoles;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command create user with admin role';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Model::unguard();

        $user = User::create(array(
            'name' => 'admin',
            'login' => 'admin',
            'phone' => null,
            'date_of_birth' => null,
            'about' => null,
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('adminadmin'),
        ));

        $entity = Role::where('role_name', UserRoles::ROLE_ADMIN)->get();

        $user->role()->sync($entity);
        $this->info('user created successfully');
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Roles\Contracts\UserRoles;
use Illuminate\Console\Command;

class FillRolesTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fillrolestable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to fill roles table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $roles = [];
        foreach (UserRoles::AVAILABLE_ROLES as $role) {
            $roleModel = app('App\Roles\\' . $role);
            $roles[] = [
                'id' => $roleModel->getId(),
                'role_name' => $roleModel->getName()
            ];
        }

        Role::insert($roles);

        $this->info('Roles added successfully');
    }
}

<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('P4ssw0rd!@')
        ]);

        $user = User::firstOrCreate([
            'email' => 'user1@admin.com',
        ], [
            'name' => 'User1',
            'password' => bcrypt('P4ssw0rd!@')
        ]);

        $user = User::firstOrCreate([
            'email' => 'user2@admin.com',
        ], [
            'name' => 'User2',
            'password' => bcrypt('P4ssw0rd!@')
        ]);
    }
}

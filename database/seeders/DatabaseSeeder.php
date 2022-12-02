<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles[] = new Role();
        $roles[] = new Role();
        $roles[0]->name = 'admin';
        $roles[1]->name = 'user';
        $roles[0]->save();
        $roles[1]->save();

        $admin = \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role_id' => $roles[0]->id
        ]);

        $user = \App\Models\User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
            'role_id' => $roles[1]->id
        ]);

        $school = \App\Models\School::create([
            'code' => 123456789,
            'name' => 'Saules gimnazija',
            'address' => 'Savanoriu pr. XX',
        ]);

        \App\Models\Student::create([
            'code' => 39912311111,
            'first_name' => 'Vilius',
            'last_name' => 'Vilesys',
            'parent_id' => $user->id,
            'school_id' => $school->code,
            'grade' => 10
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $yesterday = now()->subDay()->toDateString();
        $today = now()->toDateString();
        $tomorrow = now()->addDay()->toDateString();

        DB::table('users')->insert([
            'username'   => 'art ',
            'full_name'  => 'art abu',
            'email'      => 'art@gmail.com',
            'password'   => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tasks')->insert([
            ['title' => 'Submit IT0049 lab write-up',   'status' => 'done',    'task_date' => $yesterday, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Review Laravel routing notes', 'status' => 'done',    'task_date' => $yesterday, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Buy school supplies',          'status' => 'pending', 'task_date' => $yesterday, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Finish TSA3 Laravel project',  'status' => 'pending', 'task_date' => $today,     'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Push code to GitHub',          'status' => 'pending', 'task_date' => $today,     'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Update the README',            'status' => 'pending', 'task_date' => $today,     'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Study for the quiz',           'status' => 'pending', 'task_date' => $tomorrow,  'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Group meeting',                'status' => 'pending', 'task_date' => $tomorrow,  'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Start TSA4',                   'status' => 'pending', 'task_date' => $tomorrow,  'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
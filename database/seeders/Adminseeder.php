<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name'=>'Keshab Pandey',
            'phone'=>'9848500756',
            'email'=>'yednap170@gmail.com',
            'password'=>hash::make('keshab9848500756')

        ]);
    }
}

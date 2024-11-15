<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Conductor;
use App\Models\Refiner;
use App\Models\Freight;
use App\Models\Shipper;
use App\Models\Client;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating conductor...');
        $conductor = User::create(['name' => 'Conductor', 'email' => 'conductor@mail.com', 'password' => Hash::make('Conductor@123'), 'status'=> '1']);
        $conductor->assignRole('conductor');
        Conductor::create([
            'user_id' => $conductor->id,
            'name' => $conductor->name,
            'email' => $conductor->email,
        ]);

        // For testing
        $refiner = User::create(['name' => 'Refiner', 'email' => 'refiner@mail.com', 'password' => Hash::make('Refiner@123'), 'status'=> '1']);
        $refiner->assignRole('refiner');
        Refiner::create([
            'user_id' => $refiner->id,
            'name' => $refiner->name,
            'email' => $refiner->email,
        ]);

        $freight = User::create(['name' => 'freight', 'email' => 'freight@mail.com', 'password' => Hash::make('Freight@123'), 'status'=> '1']);
        $freight->assignRole('freight');
        Freight::create([
            'user_id' => $freight->id,
            'name' => $freight->name,
            'email' => $freight->email,
        ]);

        $shipper = User::create(['name' => 'shipper', 'email' => 'shipper@mail.com', 'password' => Hash::make('Shipper@123'), 'status'=> '1']);
        $shipper->assignRole('shipper');
        Shipper::create([
            'user_id' => $shipper->id,
            'name' => $shipper->name,
            'email' => $shipper->email,
        ]);

        $client = User::create(['name' => 'client', 'email' => 'client@mail.com', 'password' => Hash::make('Client@123'), 'status'=> '1']);
        $client->assignRole('client');
        Client::create([
            'user_id' => $client->id,
            'name' => $client->name,
            'email' => $client->email,
        ]);
    }
}

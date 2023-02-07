<?php

namespace Database\Seeders;

use App\Models\Cluster;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Setting;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InitialRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = Department::create(["name" => "Administrator"]);
        $position = Position::create(["name" => "Superuser"]);


        $user = User::create([
            "email" => "admin@superuser.com",
            "password" => Hash::make("123"),
        ]);

        Employee::create([
            "user_id" => $user->id,
            "first_name" => "John",
            "last_name" => "Doe",
            "middle_name" => "M",
            "position_id" => $position->id,
            "department_id" => $department->id,
        ]);

        Setting::create(['key' => 'monthly_due', 'value' => "0"]);
        Setting::create(['key' => 'electricity', 'value' => "0"]);
        Setting::create(['key' => 'water', 'value' => "0"]);
        $cluster = Cluster::create([
            'name' => 'Cluster 1',
            'unit_towers' => 'A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z',
            'reading_day' => '1',
            'due_date' => '1'
        ]);
        Unit::create([
            'unit_number' => '1',
            'cluster_id' => $cluster->id,
            'unit_tower' => 'A',
            'unit_floor' => '1',
            'unit_room' => '1',
            'unit_type' => 'residential',
            'floor_area' => '1',
            'unit_association_fee' => '1',
            'unit_parking_fee' => '1',
            'status' => 'reopen',
        ]);
    }
}

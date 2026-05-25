<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    $seatData = [
            ['seat_code' => 'A1', 'capacity' => '2', 'location' => 'Dekat Gerbang', 'size_table' => 'small', ],
            ['seat_code' => 'A2', 'capacity' => '2', 'location' => 'Area Tengah', 'size_table' => 'medium'],
            ['seat_code' => 'B1', 'capacity' => '4', 'location' => 'Indoor Tengah', 'size_table' => 'large'],
        ];

        foreach ($seatData as $seat) {
            Seat::create($seat);
        }

        // Seat::factory()->create([
        //     'seat_code' => 'A1',
        //     'capacity' => '2 Kursi',
        //     'location' => 'Dekat Gerbang',
        //     'size_table' => 'small',
        // ]);
    }
}

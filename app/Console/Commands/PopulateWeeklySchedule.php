<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PopulateWeeklySchedule extends Command
{
    protected $signature = 'schedule:populate-weekly';
    protected $description = 'Generate weekly schedule recommendations based on pemetaan';

    public function handle()
    {
        // Define the time slots for scheduling
        $timeSlots = [
            ['jam_masuk' => '08:00:00', 'jam_keluar' => '10:00:00'],
            ['jam_masuk' => '10:00:00', 'jam_keluar' => '12:00:00'],
            ['jam_masuk' => '13:00:00', 'jam_keluar' => '15:00:00'],
            ['jam_masuk' => '15:00:00', 'jam_keluar' => '17:00:00'],
        ];

        // Get all entries from pemetaan
        $pemetaans = DB::table('pemetaans')->get();
        $ruangans = DB::table('ruangans')->get();

        // Get the current week's start and end dates
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        foreach ($pemetaans as $pemetaan) {
            $currentDate = $startOfWeek->copy();

            while ($currentDate->lte($endOfWeek)) {
                foreach ($timeSlots as $slot) {
                    // Check if the dosen already has a schedule recommendation for the current date and time slot
                    $isDosenAvailable = !DB::table('jadwal_ruangans')
                        ->where('pemetaan_id', $pemetaan->id)
                        ->whereDate('created_at', $currentDate->toDateString())
                        ->where(function ($query) use ($slot) {
                            $query->whereBetween('jam_masuk', [$slot['jam_masuk'], $slot['jam_keluar']])
                                ->orWhereBetween('jam_keluar', [$slot['jam_masuk'], $slot['jam_keluar']]);
                        })
                        ->exists();

                    if (!$isDosenAvailable) {
                        continue; // Skip if the dosen already has a recommendation
                    }

                    // Find an available room with sufficient capacity
                    $availableRoom = $ruangans->first(function ($ruangan) use ($slot, $currentDate) {
                        $isRoomBooked = DB::table('jadwal_ruangans')
                            ->where('ruangan_id', $ruangan->id)
                            ->whereDate('created_at', $currentDate->toDateString())
                            ->where(function ($query) use ($slot) {
                                $query->whereBetween('jam_masuk', [$slot['jam_masuk'], $slot['jam_keluar']])
                                    ->orWhereBetween('jam_keluar', [$slot['jam_masuk'], $slot['jam_keluar']]);
                            })
                            ->exists();

                        return !$isRoomBooked;
                    });

                    if (!$availableRoom) {
                        continue; // Skip if no room is available
                    }

                    // Insert the recommendation into jadwal_ruangans
                    DB::table('jadwal_ruangans')->insert([
                        'pemetaan_id' => $pemetaan->id,
                        'ruangan_id' => $availableRoom->id,
                        'jam_masuk' => $slot['jam_masuk'],
                        'jam_keluar' => $slot['jam_keluar'],
                        'hari' => $currentDate->format('l'),
                        'status' => 'recommended', // Mark as a recommendation
                        'created_at' => $currentDate->toDateString(),
                        'updated_at' => now(),
                    ]);

                    $this->info("Recommended schedule created for pemetaan_id {$pemetaan->id} in room {$availableRoom->id} on {$currentDate->toDateString()}.");
                    break; // Schedule one session per day per pemetaan
                }

                // Move to the next day
                $currentDate->addDay();
            }
        }

        $this->info('Weekly schedule recommendations generated successfully.');
    }
}
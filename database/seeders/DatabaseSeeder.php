<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed 'dosens' table
        $dosens = [
            [
                'NIP' => 198711032014042001,
                'NIDN' => "0003118701",
                'Nama' => 'dr. Novriantika Lestari, M.Biomed.',
                'TTL' => 'Curup, 03-Nov-87',
                'CPNS' => '01-Apr-14',
                'Gol_Akhir' => 'III/d',
                'Pendidikan_Akhir' => 'S2/Sp1 UI',
                'Jabfung_Akhir' => 'Lektor',
                'Homebase_PDDIKTI' => 'S1 Kedokteran',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'NIP' => 198312252009121007,
                'NIDN' => "0025128301",
                'Nama' => 'dr. Zayadi Zainuddin, M.Pd.Ked., Sp.KFR',
                'TTL' => 'Rejang Lebong, 25-Dec-83',
                'CPNS' => '01-Dec-09',
                'Gol_Akhir' => 'III/d',
                'Pendidikan_Akhir' => 'S2/Sp1 UNPAD',
                'Jabfung_Akhir' => 'Lektor',
                'Homebase_PDDIKTI' => 'Pend. Profesi Dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('dosens')->insert($dosens);

        // Seed 'ruangans' table
        $ruangans = [
            ['nama_ruangan' => 'RK01', 'kapasitas' => 70, 'fasilitas' => 'LCD, Kursi Kuliah, Meja Dosen, AC,Kipas Angin, Kursi 1/2 biro hijau (kursi dosen), Papan tulis dinding, TV 29"', 'created_at' => now(), 'updated_at' => now()],
            ['nama_ruangan' => 'RK02', 'kapasitas' => 70, 'fasilitas' => 'AC, Proyektor, Papan Tulis', 'created_at' => now(), 'updated_at' => now()],
            ['nama_ruangan' => 'RK03', 'kapasitas' => 70, 'fasilitas' => 'AC, Proyektor, Papan Tulis', 'created_at' => now(), 'updated_at' => now()],
            ['nama_ruangan' => 'RK04', 'kapasitas' => 74, 'fasilitas' => 'AC, Proyektor', 'created_at' => now(), 'updated_at' => now()],
            ['nama_ruangan' => 'Seminar A', 'kapasitas' => 50, 'fasilitas' => 'AC, Proyektor, Papan Tulis, Mikrofon', 'created_at' => now(), 'updated_at' => now()],
            ['nama_ruangan' => 'Seminar B', 'kapasitas' => 100, 'fasilitas' => 'AC, Proyektor, Papan Tulis, Sound System', 'created_at' => now(), 'updated_at' => now()],
            ['nama_ruangan' => 'RD01', 'kapasitas' => 20, 'fasilitas' => 'AC, Proyektor', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('ruangans')->insert($ruangans);

        // Seed 'mata_kuliahs' table
        $mataKuliahs = [
            ['nama_matakuliah' => 'PSH-BK', 'tingkat' => 1, 'tanggal_mulai' => '2024-01-10', 'tanggal_selesai' => '2024-05-15', 'created_at' => now(), 'updated_at' => now()],
            ['nama_matakuliah' => 'EBP3KH', 'tingkat' => 1, 'tanggal_mulai' => '2024-01-15', 'tanggal_selesai' => '2024-05-20', 'created_at' => now(), 'updated_at' => now()],
            ['nama_matakuliah' => 'P2K2', 'tingkat' => 1, 'tanggal_mulai' => '2024-02-01', 'tanggal_selesai' => '2024-06-01', 'created_at' => now(), 'updated_at' => now()],
            ['nama_matakuliah' => 'Riset 1', 'tingkat' => 1, 'tanggal_mulai' => '2024-02-15', 'tanggal_selesai' => '2024-06-15', 'created_at' => now(), 'updated_at' => now()],
            ['nama_matakuliah' => 'Jaringan Komputer', 'tingkat' => 3, 'tanggal_mulai' => '2024-03-01', 'tanggal_selesai' => '2024-07-01', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('mata_kuliahs')->insert($mataKuliahs);

        // Seed 'pemetaans' table
        $pemetaans = [
            ['dosen_id' => 1, 'matakuliah_id' => 1, 'tanggal_mulai' => '2024-01-10', 'tanggal_selesai' => '2024-05-15', 'created_at' => now(), 'updated_at' => now()],
            ['dosen_id' => 2, 'matakuliah_id' => 2, 'tanggal_mulai' => '2024-01-15', 'tanggal_selesai' => '2024-05-20', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('pemetaans')->insert($pemetaans);

        // Seed 'jadwal_ruangans' table
        $jadwalRuangans = [
            ['pemetaan_id' => 1, 'ruangan_id' => 1, 'jam_masuk' => '08:00:00', 'jam_keluar' => '10:00:00', 'hari' => 'Senin', 'created_at' => now(), 'updated_at' => now()],
            ['pemetaan_id' => 2, 'ruangan_id' => 2, 'jam_masuk' => '10:00:00', 'jam_keluar' => '12:00:00', 'hari' => 'Selasa', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('jadwal_ruangans')->insert($jadwalRuangans);
    }
}
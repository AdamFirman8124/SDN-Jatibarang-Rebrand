<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Staff;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Lomba;
use App\Models\Kegiatan;
use App\Models\Buku;
use App\Models\Kontak;
use App\Models\Gallery;
use App\Models\Video;
use App\Models\Berita;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create admin user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123'
        ]);

        // Seed Staff data
        $staffs = [
            [
                'nama' => 'John Doe',
                'jabatan' => 'Kepala Sekolah',
                'foto' => 'staff1.jpg',
                'deskripsi' => 'Kepala Sekolah yang berpengalaman'
            ],
            [
                'nama' => 'Jane Smith',
                'jabatan' => 'Wakil Kepala Sekolah',
                'foto' => 'staff2.jpg',
                'deskripsi' => 'Wakil Kepala Sekolah bidang kurikulum'
            ],
            [
                'nama' => 'Mike Johnson',
                'jabatan' => 'Guru',
                'foto' => 'staff3.jpg',
                'deskripsi' => 'Guru Matematika yang profesional'
            ]
        ];

        foreach ($staffs as $staff) {
            Staff::create($staff);
        }

        // Seed Kelas data
        $kelas = [
            ['nama' => 'Kelas 1', 'staff_id' => 1],
            ['nama' => 'Kelas 2', 'staff_id' => 1],
            ['nama' => 'Kelas 3', 'staff_id' => 1],
            ['nama' => 'Kelas 4', 'staff_id' => 1],
            ['nama' => 'Kelas 5', 'staff_id' => 1],
            ['nama' => 'Kelas 6', 'staff_id' => 1],
        ];

        foreach ($kelas as $k) {
            Kelas::create($k);
        }

        // Seed Siswa data
        $kelasList = Kelas::all();
        foreach ($kelasList as $kelas) {
            for ($i = 1; $i <= 5; $i++) {
                Siswa::create([
                    'nama'          => "Siswa {$kelas->nama} {$i}",
                    'nis'           => rand(10000, 99999),
                    'jenis_kelamin' => $i % 2 === 0 ? 'Laki-laki' : 'Perempuan',
                    'kelas_id'      => $kelas->id,
                ]);
            }
        }

        // Seed Lomba data
        $lombas = [
            [
                'nama' => 'Olimpiade Matematika',
                'jenis' => 'Akademik',
                'tanggal' => '2024-04-15',
                'tempat' => 'Aula Sekolah',
                'lokasi' => 'SMA Negeri 1 Jatibarang',
                'penyelenggara' => 'Dinas Pendidikan',
                'deskripsi' => 'Kompetisi matematika tingkat kabupaten'
            ],
            [
                'nama' => 'Lomba Cerdas Cermat',
                'jenis' => 'Akademik',
                'tanggal' => '2024-05-20',
                'tempat' => 'Gedung Serbaguna',
                'lokasi' => 'Kantor Bupati',
                'penyelenggara' => 'Pemda Kabupaten',
                'deskripsi' => 'Kompetisi pengetahuan umum antar sekolah'
            ]
        ];

        foreach ($lombas as $lomba) {
            Lomba::create($lomba);
        }

        // Seed Kegiatan data
        $kegiatans = [
            [
                'nama' => 'Kunjungan Industri',
                'jenis' => 'Kunjungan',
                'tanggal' => '2024-03-25',
                'tempat' => 'PT Maju Jaya',
                'lokasi' => 'Kawasan Industri Jatibarang',
                'penanggung_jawab' => 'Kepala Sekolah',
                'deskripsi' => 'Kunjungan industri untuk siswa kelas XII'
            ],
            [
                'nama' => 'Seminar Karir',
                'jenis' => 'Seminar',
                'tanggal' => '2024-04-10',
                'tempat' => 'Aula Sekolah',
                'lokasi' => 'SMA Negeri 1 Jatibarang',
                'penanggung_jawab' => 'Guru BK',
                'deskripsi' => 'Seminar karir untuk siswa kelas XII'
            ]
        ];

        foreach ($kegiatans as $kegiatan) {
            Kegiatan::create($kegiatan);
        }

        // Seed Buku data
        $bukus = [
            [
                'judul' => 'Matematika Dasar',
                'pengarang' => 'Dr. Budi Santoso',
                'penerbit' => 'Erlangga',
                'tahun_terbit' => 2023,
                'kategori' => 'Pelajaran',
                'jumlah' => 50,
                'deskripsi' => 'Buku pelajaran matematika untuk SMA'
            ],
            [
                'judul' => 'Fisika Modern',
                'pengarang' => 'Prof. Siti Aminah',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => 2023,
                'kategori' => 'Pelajaran',
                'jumlah' => 30,
                'deskripsi' => 'Buku pelajaran fisika untuk SMA'
            ]
        ];

        foreach ($bukus as $buku) {
            Buku::create($buku);
        }

        // Seed Kontak data
        $kontaks = [
            [
                'nama' => 'Sekretariat',
                'email' => 'sekretariat@sman1jatibarang.sch.id',
                'telepon' => '0283-123456',
                'jabatan' => 'Staff',
                'alamat' => 'Jl. Pendidikan No. 1, Jatibarang'
            ],
            [
                'nama' => 'Kurikulum',
                'email' => 'kurikulum@sman1jatibarang.sch.id',
                'telepon' => '0283-123457',
                'jabatan' => 'Staff',
                'alamat' => 'Jl. Pendidikan No. 1, Jatibarang'
            ]
        ];

        foreach ($kontaks as $kontak) {
            Kontak::create($kontak);
        }

        // Seed Gallery data
        $galleries = [
            [
                'path' => 'gallery1.jpg'
            ],
            [
                'path' => 'gallery2.jpg'
            ]
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }

        // Seed Video data
        $videos = [
            [
                'judul' => 'Pembelajaran Matematika',
                'mapel' => 'Matematika'
            ],
            [
                'judul' => 'Pembelajaran IPA',
                'mapel' => 'IPA'
            ]
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }

        // Seed Berita data
        $beritas = [
            [
                'judul' => 'Penerimaan Siswa Baru',
                'tanggal' => '2024-06-01',
                'kategori' => 'Pengumuman',
                'penulis' => 'Admin',
                'deskripsi' => 'Informasi penerimaan siswa baru tahun ajaran 2024/2025',
                'gallery_id' => 1
            ],
            [
                'judul' => 'Kegiatan Pramuka',
                'tanggal' => '2024-05-15',
                'kategori' => 'Kegiatan',
                'penulis' => 'Admin',
                'deskripsi' => 'Kegiatan pramuka rutin mingguan',
                'gallery_id' => 2
            ]
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Rapor;
use Illuminate\Http\Request;

class AplikasiController extends Controller
{
    public function all()
    {
        echo "## Mahasiswa ## <br>";
        $mahasiswas = Mahasiswa::all();
        foreach ($mahasiswas as $mahasiswa) {
            echo "$mahasiswa->id | $mahasiswa->nim |
 $mahasiswa->nama | $mahasiswa->jurusan <br>";
        }

        echo "<hr>";

        echo "## Nilai ## <br>";
        $nilais = Nilai::all();
        foreach ($nilais as $nilai) {
            echo "$nilai->id | $nilai->sem_1 | $nilai->sem_2 |
 $nilai->sem_3 | $nilai->mahasiswa_id <br>";
        }

        echo "<hr>";

        echo "## Rapor ## <br>";
        $rapors = Rapor::all();
        foreach ($rapors as $rapor) {
            echo "$rapor->id | $rapor->catatan | $rapor->nilai_id <br>";
        }
    }

    public function relationship1()
    {
        echo "## Mahasiswa - Nilai ## <br>";
        $mahasiswas = Mahasiswa::has('nilai')->get();
        foreach ($mahasiswas as $mahasiswa) {
            echo "$mahasiswa->nama | {$mahasiswa->nilai->sem_1}
 {$mahasiswa->nilai->sem_2} {$mahasiswa->nilai->sem_3} <br>";
        }

        echo "<hr>";

        echo "## Nilai - Rapor ## <br>";
        $nilais = Nilai::has('rapor')->get();
        foreach ($nilais as $nilai) {
            echo "$nilai->sem_1 | $nilai->sem_2 | $nilai->sem_3 |
 {$nilai->rapor->catatan} <br>";
        }
    }

    public function relationship2()
    {
        echo "## Mahasiswa - Rapor ## <br>";
        $mahasiswas = Mahasiswa::has('nilai')->get();
        foreach ($mahasiswas as $mahasiswa) {
            echo "$mahasiswa->nama | {$mahasiswa->nilai->rapor->catatan} <br>";
        }
    }

    public function relationship3()
    {
        echo "## Mahasiswa - Rapor ## <br>";
        $mahasiswas = Mahasiswa::has('rapor')->get();
        foreach ($mahasiswas as $mahasiswa) {
            echo "$mahasiswa->nama | {$mahasiswa->rapor->catatan} <br>";
        }
    }

    public function input1()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Tiara Siregar')->first();

        $nilai = new Nilai;
        $nilai->sem_1 = 1.12;
        $nilai->sem_2 = 1.23;
        $nilai->sem_3 = 1.34;

        $mahasiswa->nilai()->save($nilai);

        $rapor = new Rapor;
        $rapor->catatan = 'Ini serius kuliah ga sih?';

        $mahasiswa->rapor()->save($rapor);

        echo "Penambahan data $mahasiswa->nama berhasil";
    }

    public function input2()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Yuliana Nurdiyanti')->first();

        $nilai = new Nilai;
        $nilai->sem_1 = 1.12;
        $nilai->sem_2 = 1.23;
        $nilai->sem_3 = 1.34;

        $mahasiswa->nilai()->save($nilai);

        $rapor = new Rapor;
        $rapor->catatan = 'Ini serius kuliah ga sih?';

        $nilai->rapor()->save($rapor);

        echo "Penambahan data $mahasiswa->nama berhasil";
    }

    public function delete()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Galang Maryadi')->first();
        $mahasiswa->delete();

        echo "Data $mahasiswa->nama berhasil di hapus";
    }
}

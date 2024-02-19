<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Pemohon;
use App\Models\Periode;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Barryvdh\DomPDF\Facade\Pdf;

class HasilController extends Controller
{
    public function index()
    {
        return view('Hasil/PeriodeHasil', [
            "title" => "Periode Hasil",
            "periode" => Periode::all()
        ]);
    }
    public function hasil($id)
    {

        $count = Alternatif::where('id_periode', $id)->count();
        // dd($count);
        if ($count <= 5) {
            return abort(403, 'Anda Harus Minimal Mengisi 2 Alternatif');
        } else {
            // dd($id);
            $kriteria = Kriteria::all();
            $data = Alternatif::join('nilais', 'nilais.id', '=', 'alternatifs.nilai_id')
                ->join('pemohons', 'pemohons.id', '=', 'alternatifs.pemohon_id')
                ->join('kriterias', 'kriterias.id', '=', 'alternatifs.kriteria_id')
                ->where('alternatifs.id_periode', '=', $id)
                ->select('pemohons.id as id', 'kriterias.namaKriteria as kriteria', 'kriterias.nilaiBobot as bobot', 'nilais.nilai as rating')
                ->get()->toArray();
            // dd($data);
            // database to array
            foreach ($data as $key => $value) {
                if ($data[$key]['kriteria'] == 'character' && $data[$key]['id'] == $value['id']) {
                    $nilai[$value['id']][0] = $data[$key]['rating'];
                }
                if ($data[$key]['kriteria'] == 'capacity' && $data[$key]['id'] == $value['id']) {
                    $nilai[$value['id']][1] = $data[$key]['rating'];
                }
                if ($data[$key]['kriteria'] == 'capital' && $data[$key]['id'] == $value['id']) {
                    $nilai[$value['id']][2] = $data[$key]['rating'];
                }
                if ($data[$key]['kriteria'] == 'condition' && $data[$key]['id'] == $value['id']) {
                    $nilai[$value['id']][3] = $data[$key]['rating'];
                }
                if ($data[$key]['kriteria'] == 'collateral' && $data[$key]['id'] == $value['id']) {
                    $nilai[$value['id']][4] = $data[$key]['rating'];
                }
            }
            // dd($nilai);
            // Menghitung Matriks normalisasi (2)
            $pembagi = array_fill(0, 5, 0);
            // MENGHITUNG PEMBAGI
            for ($i = 0; $i < 5; $i++) {
                foreach ($nilai as $key => $value) {
                    $pembagi[$i] += pow($nilai[$key][$i], 2);
                }
            }
            // dd($pembagi);
            for ($i = 0; $i < count($pembagi); $i++) {
                $pembagi[$i] = round(sqrt($pembagi[$i]), 3);
            }
            // dd($pembagi);
            // Akhir menghitung pembagi
            // MENGHITUNG MATRIKS NORMALISASI
            $normalisasiMatriks = array();
            foreach ($nilai as $key => $value) {
                for ($i = 0; $i < 5; $i++) {
                    $normalisasiMatriks[$key][$i] = round($nilai[$key][$i] / $pembagi[$i], 3);
                }
            }
            // dd($normalisasiMatriks);
            // AKHIR
            // MENGHITUNG MATRIKS NORMALISASI TERBOBOT
            // ambil bobot kriteria
            foreach ($kriteria as $key => $column) {
                $bobotKriteria[] = $column['nilaiBobot'];
            }
            // dd($bobotKriteria);
            //mulai matriks nomalisasi terbobot
            foreach ($normalisasiMatriks as $key => $value) {
                for ($i = 0; $i < count($bobotKriteria); $i++) {
                    $normalisasiTerbobot[$key][$i] = $normalisasiMatriks[$key][$i] * $bobotKriteria[$i];
                }
            }
            // dd($normalisasiTerbobot);
            // MENCARI NILAI MINIMUM DAN MAKSIMUM
            //MENGELOMPOKKAN DATA
            $collect = array();
            $arrMax = array();
            $arrMin = array();
            for ($i = 0; $i < 5; $i++) {
                foreach ($normalisasiTerbobot as $key => $value) {
                    $collect[$i][$key] = $normalisasiTerbobot[$key][$i];
                }
                $arrMax[$i] = max($collect[$i]);
                $arrMin[$i] = min($collect[$i]);
            }
            // dd($collect);
            // dd($arrMin);
            // MENGHITUNG JARAK SOLUSI POSITIF
            $arrPos = array();
            $arrPositif = array();
            foreach ($normalisasiTerbobot as $key => $value) {
                for ($i = 0; $i < 5; $i++) {
                    $arrPos[$key][$i] = round(pow($arrMax[$i] - $normalisasiTerbobot[$key][$i], 2), 3);
                }
                $arrPositif[$key] = round(sqrt(array_sum($arrPos[$key])), 3);
            }
            // dd($arrPositif);
            // MENGHITUNG JARAK SOLUSI NEGATIF
            $arrNeg = array();
            $arrNegatif = array();
            foreach ($normalisasiTerbobot as $key => $value) {
                for ($i = 0; $i < 5; $i++) {
                    $arrNeg[$key][$i] = round(pow($arrMin[$i] - $normalisasiTerbobot[$key][$i], 2), 3);
                }
                $arrNegatif[$key] = round(sqrt(array_sum($arrNeg[$key])), 3);
            }
            // dd($arrPositif);
            // PERHITUNGAN NILAI PREFERENSI ALTERNATIF

            $preferensi = array();
            foreach ($arrPositif as $key => $value) {
                $preferensi[$key] = round($arrNegatif[$key] /  ($arrNegatif[$key] + $arrPositif[$key]), 3);
            }
            // $sorted = Arr::sort($preferensi);
            //MENGURUTKAN ARRAY DARI YANG TERBESAR KE TERKECIL
            // $hasil = array_reverse($sorted);
            // dd($preferensi);
            // dd($hasil);

            Hasil::where('id_periode', $id)->delete();
            foreach ($preferensi as $key => $value) {
                Hasil::create([
                    'id_pemohon' => $key,
                    'id_periode' => $id,
                    'nilai' => $value,
                ]);
            }

            return view('Hasil/hasil', [
                'title' => 'Hasil Perhitungan',
                'periode' => Periode::where('id', $id)->first(),
                'hasil' => Hasil::where('id_periode', $id)->get(),
                'nilai' => $nilai,
                'pembagi' => $pembagi,
                'normalisasiMatriks' => $normalisasiMatriks,
                'normalisasiTerbobot' => $normalisasiTerbobot,
                'kriteria' => $kriteria,
                'positif' => $arrMax,
                'negatif' => $arrMin,
                'arrPositif' => $arrPositif,
                'arrNegatif' => $arrNegatif,
            ]);
        }
    }

    public function detail($periode, $id)
    {
        $alternatif = Alternatif::where('pemohon_id', $id)->where('id_periode', $periode)->get();
        // $pemohon = Pemohon::where('id', $id)->get();
        return view('Hasil/detail', [
            'title' => 'Detail Penilaian Pemohon',
            'penilaian' => $alternatif
        ]);
    }

    public function cetak($id)
    {
        $data = [
            'title' => 'Cetak Hasil',
            'judul' => Periode::where('id', $id)->first(),
            'data' => Hasil::where('id_periode', $id)->get(),
        ];

        return view('Hasil.cetak', $data);
        // $pdf = Pdf::loadView('Hasil.cetak', $data)-> setPaper('a4', 'potrait')->setWarnings(false);
        // return $pdf->download('Hasil Pendukung Keputusan Nasabah.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\TrainingType;

class RegistrationController extends Controller
{
    public function index()
    {
        // Ambil semua pelatihan dengan relasi training type untuk filter dinamis
        $trainings = Training::with('trainingType')
            ->select('id', 'title', 'training_type_id')
            ->orderBy('title', 'asc')
            ->get();
        
        // Ambil unique jenis pelatihan (training types) untuk dropdown "Sertifikasi Pelatihan"
        $trainingTypes = TrainingType::select('id', 'type')->orderBy('type', 'asc')->get();
        
        return view('registration', compact('trainings', 'trainingTypes'));
    }
    
    public function submit(Request $request)
    {
        // Validate the form
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:50',
            'sumber_anggaran' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat_domisili' => 'required|string',
            'kode_pos' => 'required|string|max:10',
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'pendidikan_terakhir' => 'required|string|max:100',
            'nama_perusahaan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:100',
            'alamat_perusahaan' => 'required|string',
            'sertifikasi_pelatihan' => 'required|string|max:255',
            'jenis_pelatihan' => 'required|string|max:255',
            'uji_kompetensi' => 'required|string|max:255',
        ]);
        
        // Build WhatsApp message
        $message = "*FORMULIR REGISTRASI PELATIHAN DAN SERTIFIKASI*\n\n";
        $message .= "*DATA DIRI*\n";
        $message .= "Nama Lengkap: {$validated['nama_lengkap']}\n";
        $message .= "NIK KTP/PASPOR: {$validated['nik']}\n";
        $message .= "Sumber Anggaran: {$validated['sumber_anggaran']}\n";
        $message .= "Jenis Kelamin: {$validated['jenis_kelamin']}\n";
        $message .= "Alamat Domisili: {$validated['alamat_domisili']}\n";
        $message .= "Kode Pos: {$validated['kode_pos']}\n";
        $message .= "No Telepon/HP: {$validated['no_telepon']}\n";
        $message .= "Email: {$validated['email']}\n";
        $message .= "Pendidikan Terakhir: {$validated['pendidikan_terakhir']}\n\n";
        
        $message .= "*DATA PERUSAHAAN*\n";
        $message .= "Nama Perusahaan: {$validated['nama_perusahaan']}\n";
        $message .= "Jabatan: {$validated['jabatan']}\n";
        $message .= "Alamat Perusahaan: {$validated['alamat_perusahaan']}\n\n";
        
        $message .= "*PILIHAN PELATIHAN*\n";
        $message .= "Sertifikasi Pelatihan: {$validated['sertifikasi_pelatihan']}\n";
        $message .= "Jenis Pelatihan: {$validated['jenis_pelatihan']}\n";
        $message .= "Uji Kompetensi: {$validated['uji_kompetensi']}\n";
        
        // Encode message for URL
        $encodedMessage = urlencode($message);
        
        // WhatsApp number
        $whatsappNumber = '6282118464692';
        
        // Redirect to WhatsApp
        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text={$encodedMessage}";
        
        return redirect()->away($whatsappUrl);
    }
}

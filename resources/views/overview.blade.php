@extends('layouts.sidebar-admin')

@section('title', 'overview')

<div class="container">
    <h1 class="text-green-900 text-4xl font-bold mb-6">Riwayat Pengajuan Surat Izin Keluar Kantor</h1>
    
    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $izin->pengirim->nama ?? 'Tidak Diketahui' }}" readonly>
            </div>
            <div>
                <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                <input type="text" name="nip" id="nip" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $izin->pengirim->nip ?? '' }}" readonly>
            </div>
            <div>
                <label for="pangkat" class="block text-sm font-medium text-gray-700">Pangkat/Gol/Ruang</label>
                <input type="text" name="pangkat" id="pangkat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $izin->pengirim->pangkat ?? '' }}" readonly>
            </div>
            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $izin->tanggal }}" readonly>
            </div>
            <div>
                <label for="waktu_keluar" class="block text-sm font-medium text-gray-700">Jam Keluar</label>
                <input type="time" name="waktu_keluar" id="waktu_keluar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $izin->waktu_keluar }}" readonly>
            </div>
            <div>
                <label for="waktu_kembali" class="block text-sm font-medium text-gray-700">Jam Kembali</label>
                <input type="time" name="waktu_kembali" id="waktu_kembali" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $izin->waktu_kembali }}" readonly>
            </div>
        </div>
        <div class="mb-4">
            <label for="keperluan" class="block text-sm font-medium text-gray-700">Keperluan</label>
            <textarea name="keperluan" id="keperluan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" readonly>{{ $izin->keperluan }}</textarea>
        </div>
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status Surat</label>
            <input type="text" name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $izin->status }}" readonly>
        </div>
        <div class="flex justify-end">
            <button class="bg-blue-700 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-800">Unduh</button>
            <a href="{{ route('izin.index') }}" class="bg-red-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-700 ml-2">Kembali</a>
        </div>
    </div>
</div>
@endsection


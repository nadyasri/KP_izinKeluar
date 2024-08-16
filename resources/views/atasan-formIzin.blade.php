@extends('layouts.sidebar-atasan')

@section('title', 'Form Izin Atasan')

@section('atasan-content')

<h1 class="text-green-900 text-4xl font-bold mb-6">Form Pengajuan Surat Izin Keluar Kantor</h1>
<form action="{{ route('atasan-kirimIzin') }}" method="POST" class="bg-gray-100 p-6 rounded-lg shadow-md">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <input type="hidden" name="groupId_pengirim" value="{{ auth()->user()->Users_groupId }}">
        </div>
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $user->nama ?? '' }}" readonly>
        </div>
        <div>
            <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
            <input type="text" name="nip" id="nip" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $user->nip ?? '' }}" readonly>
        </div>
        <div>
            <label for="pangkat" class="block text-sm font-medium text-gray-700">Pangkat/Gol/Ruang</label>
            <input type="text" name="pangkat" id="pangkat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $user->pangkat ?? '' }}" readonly>
        </div>
        <div>
            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div>
            <label for="waktu_keluar" class="block text-sm font-medium text-gray-700">Jam Keluar</label>
            <input type="time" name="waktu_keluar" id="waktu_keluar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div>
            <label for="waktu_kembali" class="block text-sm font-medium text-gray-700">Jam Kembali</label>
            <input type="time" name="waktu_kembali" id="waktu_kembali" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
    </div>
    <div class="mb-4">
        <label for="Keperluan" class="block text-sm font-medium text-gray-700">Keperluan</label>
        <textarea name="keperluan" id="keperluan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
    </div>
    <div class="flex justify-end">
        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-800">Buat Pengajuan</button>
        <button type="button" href= "{{ route('pegawai-dashboard') }}" class="bg-red-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-700 ml-2">Batal</button>
    </div>
</form>

@endsection
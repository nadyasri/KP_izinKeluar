@extends('layouts.sidebar-pegawai')

@section('title', 'Form Izin Pegawai')

@section('pegawai-content')

<h1 class="text-green-900 text-4xl font-bold mb-6">Form Pengajuan Surat Izin Keluar Kantor</h1>

<form action="{{ route('pegawai-kirimIzin') }}" method="POST" class="bg-gray-300 p-8 rounded-lg shadow-md">
    @csrf
    <input type="hidden" name="groupId_pengirim" value="{{ $groupid_pengirim }}">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <label for="nama" class="block text-xl font-bold text-black">Nama</label>
            <input type="text" name="nama" id="nama" class="mt-1 block  w-3/4 h-12 rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-lg" value="{{ $user->nama ?? '' }}" readonly>
        </div>
        <div>
            <label for="nip" class="block text-xl font-bold text-black">NIP</label>
            <input type="text" name="nip" id="nip" class="mt-1 block  w-3/4 h-12 rounded-md border-gray-300 shadow-sm text-lg" value="{{ $user->nip ?? '' }}" readonly>
        </div>
        <div>
            <label for="pangkat" class="block text-xl font-bold text-black">Pangkat/Gol/Ruang</label>
            <input type="text" name="pangkat" id="pangkat" class="mt-1 block  w-3/4 h-12 rounded-md border-gray-300 shadow-sm text-lg" value="{{ $user->pangkat ?? '' }}" readonly>
        </div>
        <div>
            <label for="tanggal" class="block text-xl font-bold text-black">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="mt-1 block  w-3/4 h-12 rounded-md border-gray-300 shadow-sm text-lg">
        </div>
        <div>
            <label for="waktu_keluar" class="block text-xl font-bold text-black">Jam Keluar</label>
            <input type="time" name="waktu_keluar" id="waktu_keluar" class="mt-1 block w-3/4 h-12 rounded-md border-gray-300 shadow-sm text-lg">
        </div>
        <div>
            <label for="waktu_kembali" class="block text-xl font-bold text-black">Jam Kembali</label>
            <input type="time" name="waktu_kembali" id="waktu_kembali" class="mt-1 block  w-3/4 h-12 rounded-md border-gray-300 shadow-sm text-lg">
        </div>
    </div>

    <div class="mb-6">
        <label for="keperluan" class="block text-xl font-bold text-black">Keperluan</label>
        <textarea name="keperluan" id="keperluan" rows="4" class="mt-1 block w-11/12 h-20 rounded-md border-gray-300 shadow-sm text-lg"></textarea>
    </div>

    <div class="flex justify-end space-x-4">
        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-800">Buat Pengajuan</button>
        <a href="{{ route('pegawai-dashboard') }}" class="bg-red-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-700">Batal</a>
    </div>
</form>

@endsection
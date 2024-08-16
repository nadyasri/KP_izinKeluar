@extends('layouts.sidebar-atasan')

@section('title', 'Kelola Verifikasi Pengajuan ')

@section('atasan-content')

<h1 class="text-green-900 text-3xl font-bold mb-6">Verifikasi Pengajuan Surat Izin Keluar Kantor</h1>
<hr class="border-t-2 border-gray-200 my-6">

<!-- Table for Perizinan -->
<div class="overflow-x-auto max-h-72 overflow-y-auto mb-8 border border-gray-300">
    <table class="min-w-full bg-white divide-y divide-gray-200">
        <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <tr>
                <th class="py-2 px-6 text-center">No</th>
                <th class="py-2 px-6 text-center">Tanggal Pengajuan</th>
                <th class="py-3 px-6 text-center">NIP</th>
                <th class="py-3 px-6 text-center">Nama</th>
                <th class="py-3 px-6 text-center">Keperluan</th>
                <th class="py-3 px-6 text-center">Status</th>
                <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($izin as $izin)
            <tr>
                <td class="py-3 px-6 text-center">{{ $loop->iteration }}</td>
                <td class="py-3 px-6 text-center">{{ $izin->tanggal }}</td>
                <td class="py-3 px-6 text-center">{{ $izin->nip }}</td>
                <td class="py-3 px-6 text-center">{{ $izin->nama }}</td>
                <td class="py-3 px-6 text-center">{{ $izin->jabatan }}</td>
                <td class="py-3 px-6 text-center">{{ $izin->pangkat }}</td>
                <td class="py-3 px-3 text-center">
                    <button type="button" onclick="window.location='{{ route('admin.edit', ['nip' => $peg->nip]) }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded"> Lihat Pengajuan </button> //ganti jadi tombol review surat
                    <button type="button" onclick="window.location='{{ route('', ['nip' => $peg->nip]) }}'" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded"> Download Surat </button> ganti jadi tombol download surat
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

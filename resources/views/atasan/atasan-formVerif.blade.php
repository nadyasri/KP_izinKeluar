@extends('layouts.sidebar-atasan')

@section('title', 'SIKAN | Form Verifikasi Pengajuan ')

@section('atasan-content')

<h1 class="text-green-900 text-4xl font-bold mb-6">Verifikasi Pengajuan Surat Izin Keluar Kantor</h1>
                
<form action="{{ route('atasan-formVerif', ['id_izin' => $ajuIzin->id_izin]) }}" method="GET" class="bg-gray-100 p-6 rounded-lg shadow-md">
@csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $ajuIzin->nama?? '' }}" readonly>
        </div>
        <div>
            <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
            <input type="text" name="nip" id="nip" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $ajuIzin->nip ?? '' }}" readonly>
        </div>
        <div>
            <label for="pangkat" class="block text-sm font-medium text-gray-700">Pangkat/Gol/Ruang</label>
            <input type="text" name="pangkat" id="pangkat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $ajuIzin->pangkat ?? '' }}" readonly>
        </div>
        <div>
            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
            <input type="date" name="tanggal" id="Tanggal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $ajuIzin->tanggal }}">
        </div>
        <div>
            <label for="Waktu_keluar" class="block text-sm font-medium text-gray-700">Jam Keluar</label>
            <input type="time" name="waktu_keluar" id="waktu_keluar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $ajuIzin->waktu_keluar }}">
        </div>
        <div>
            <label for="waktu_kembali" class="block text-sm font-medium text-gray-700">Jam Kembali</label>
            <input type="time" name="waktu_kembali" id="waktu_kembali" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $ajuIzin->waktu_kembali }}">
        </div>
    </div>
    <div class="mb-4">
        <label for="Keperluan" class="block text-sm font-medium text-gray-700">Keperluan</label>
        <textarea name="Keperluan" id="Keperluan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $ajuIzin->keperluan }}"></textarea>
    </div>
</form>

<td>
    <form action="{{ route('atasan-update', $ajuIzin->id_izin) }}" method="POST" style="display: inline;">
        @csrf
        @method('PUT')
        <input type="hidden" name="status" value="approved">
        <button type="submit" class="btn btn-success">Setuju</button>
    </form>
    <form action="{{ route('surat.update', $ajuIzin->id_izin) }}" method="POST" style="display: inline;">
        @csrf
        @method('PUT')
        <input type="hidden" name="status" value="rejected">
        <button type="submit" class="btn btn-danger">Tolak</button>
    </form>
</td>

@endsection
@extends('layouts.sidebar-admin')

@section('title', 'Kelola Data Perizinan')

@section('admin-content')

<h1 class="text-green-900 text-3xl font-bold mb-6">Riwayat Pengajuan Surat Izin Keluar Kantor</h1>
<hr class="border-t-2 border-gray-200 my-6">
                
<!-- Filter content -->
<form method="GET" action="{{ route('admin-manageIzin') }}">
    <div class="flex items-center space-x-4 mb-6">
        <div class="flex flex-col w-1/3">
            <input type="text" name="nip" id="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-1.5" placeholder="Masukkan NIP" value="{{ request('nip') }}">
        </div>
        <div class="flex flex-col w-1/3">
            <input id="date" name="date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-1.5" value="{{ request('tanggal') }}">
        </div>
        <div>
            <button type="button" onclick="#" class="h-10 w-20 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mb-4 mt-1"> Filter </button>
            <button type="button" onclick="window.location='{{ route('admin-manageIzin') }}'" class="h-10 w-20 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mb-4 mt-1"> Reset </button>
        </div>
    </div>
</form>

<!-- Display Data -->
<div class="container mx-auto">
    <div class="overflow-x-auto max-h-72 overflow-y-auto mb-8 border border-gray-300">
        <table class="min-w-full bg-white divide-y divide-gray-200">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-center">No</th>
                    <th class="py-3 px-6 text-center">Tanggal Pengajuan</th>
                    <th class="py-3 px-6 text-center">NIP</th>
                    <th class="py-3 px-6 text-center">Nama</th>
                    <th class="py-3 px-6 text-center">Keperluan</th>
                    <th class="py-3 px-6 text-center">Status</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($data as $d)
                <tr>
                    <td class="py-2 px-2 text-center">{{ $loop->iteration }}</td>
                    <td class="py-2 px-2 text-center">{{ $d->tanggal }}</td>
                    <td class="py-3 px-3 text-center">{{ $d->nip }}</td>
                    <td class="py-3 px-3 text-center">{{ $d->nama }}</td>
                    <td class="py-3 px-3 text-center">{{ $d->keperluan }}</td>

                    <!-- Conditional Status -->
                    <td class="py-3 px-3 text-center">
                        @if ($d->status == 'menunggu')
                            <span class="block text-purple-600 bg-purple-100 rounded-full px-2 py-1">Menunggu</span>
                        @elseif ($d->status == 'diterima')
                            <span class="block text-green-600 bg-green-100 rounded-full px-2 py-1">Diterima</span>
                        @elseif ($d->status == 'ditolak')
                            <span class="block text-red-600 bg-red-100 rounded-full px-2 py-1">Ditolak</span>
                        @endif
                    </td>

                    <td class="py-3 px-3 text-center">
                        <button type="button" onclick="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded"> Lihat </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('layouts.sidebar-admin')

@section('title', 'Kelola Data Akun')

@section('admin-content')
                <h1 class="text-green-900 text-3xl font-bold mb-6">Daftar Akun Pengguna Pegawai dan Atasan</h1>
                <hr class="border-t-2 border-gray-200 my-6">

                <!-- Table for Atasan -->
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-2">Data Atasan</h2>
                    <!-- harus revisi database-nya, dan registernya -->
                    <button type="button" onclick="window.location='{{ route('register.register') }}'" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded top-0 right-0"> + tambah data </button>
                    <div class="overflow-x-auto max-h-72 overflow-y-auto mb-8 border border-gray-300">
                        <table class="min-w-full bg-white divide-y divide-gray-200">
                            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <tr>
                                    <th class="py-3 px-6 text-center">No</th>
                                    <th class="py-3 px-6 text-center">NIP</th>
                                    <th class="py-3 px-6 text-center">Nama Depan</th>
                                    <th class="py-3 px-6 text-center">Nama Belakang</th>
                                    <th class="py-3 px-6 text-center">Jabatan</th>
                                    <th class="py-3 px-6 text-center">Gol.</th>
                                    <th class="py-3 px-6 text-center">Username</th>
                                    <th class="py-3 px-6 text-center">Password</th>
                                    <th class="py-3 px-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($atasan as $atas)
                                <tr>
                                    <td class="py-2 px-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-3 text-center">{{ $atas->nip }}</td>
                                    <td class="py-3 px-3 text-center">{{ $atas->namaDepan }}</td>
                                    <td class="py-3 px-3 text-center">{{ $atas->namaBelakang }}</td>
                                    <td class="py-3 px-3 text-center">{{ $atas->jabatan }}</td>
                                    <td class="py-3 px-3 text-center">{{ $atas->pangkat }}</td>
                                    <td class="py-3 px-3 text-center">{{ $atas->username }}</td>
                                    <td class="py-3 px-3 text-center">{{ $atas->decrypted_password}}</td>
                                    <td class="py-3 px-3 text-center">
                                        <button type="button" onclick="window.location='{{ route('atasan.edit', ['nip' => $atas->nip]) }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded"> Ubah </button>
                                        <button type="button" onclick="window.location='{{ route('all.delete', ['nip' => $atas->nip]) }}'" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded"> Hapus </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Table for Pegawai -->
                    <h2 class="text-2xl font-bold mb-2">Data Pegawai</h2>
                    <button type="button" onclick="window.location='{{ route('register.register') }}'" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded top-0 right-0"> + tambah data </button> //make different view for input the pegawai's data and change the route (harus revisi database-nya, dan registernya)
                    <div class="overflow-x-auto max-h-72 overflow-y-auto mb-8 border border-gray-300">
                        <table class="min-w-full bg-white divide-y divide-gray-200">
                            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <tr>
                                    <th class="py-2 px-6 text-center">No</th>
                                    <th class="py-2 px-6 text-center">Atasan</th>
                                    <th class="py-3 px-6 text-center">NIP</th>
                                    <th class="py-3 px-6 text-center">Nama Depan</th>
                                    <th class="py-3 px-6 text-center">Nama Belakang</th>
                                    <th class="py-3 px-6 text-center">Jabatan</th>
                                    <th class="py-3 px-6 text-center">Gol.</th>
                                    <th class="py-3 px-6 text-center">Username</th>
                                    <th class="py-3 px-6 text-center">Password</th>
                                    <th class="py-3 px-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($pegawai as $peg)
                                <tr>
                                    <td class="py-3 px-6 text-center">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-6 text-center">{{ $peg->id_atasan }}</td>
                                    <td class="py-3 px-6 text-center">{{ $peg->nip }}</td>
                                    <td class="py-3 px-6 text-center">{{ $peg->namaDepan }}</td>
                                    <td class="py-3 px-6 text-center">{{ $peg->namaBelakang }}</td>
                                    <td class="py-3 px-6 text-center">{{ $peg->jabatan }}</td>
                                    <td class="py-3 px-6 text-center">{{ $peg->pangkat }}</td>
                                    <td class="py-3 px-6 text-center">{{ $peg->username }}</td>
                                    <td class="py-3 px-6 text-center">{{ $peg->decrypted_password }}</td>
                                    <td class="py-3 px-3 text-center">
                                        <button type="button" onclick="window.location='{{ route('admin.edit', ['nip' => $peg->nip]) }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded"> Ubah </button>
                                        <button type="button" onclick="window.location='{{ route('all.delete', ['nip' => $peg->nip]) }}'" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded"> Hapus </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
@endsection
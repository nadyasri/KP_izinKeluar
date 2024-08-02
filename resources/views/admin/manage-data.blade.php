<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&display=swap');
</style>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <div class="bg-green-700 text-white w-64 min-h-screen flex flex-col p-4">
            <div class="text-white flex flex-col items-center">
                <img src="resources/assets/ppAdm.jpg" alt="Profile Picture" class="p-10 rounded-full w-24 h-24 mb-4">
                <h2 class="text-xl font-bold p-6">Adminum</h2>
            </div>
            <nav class="mt-6 flex-grow">
                <ul>
                    <li class="mb-2 text-amber-50">
                        <a href="/resources/views/admin/dashboard.blade.php" class="font-semibold text-amber-100 block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="font-semibold block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Daftar Akun Pengguna Pegawai dan Atasan</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="font-semibold block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Riwayat Pengajuan Izin Keluar Kantor Pegawai</a>
                    </li>
                </ul>
            </nav>
            <div class="mt-auto">
                <a href="#" class="text-yellow-500 font-bold block py-2.5 px-4 text-logout transition duration-200 hover:bg-black rounded">Logout</a>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-grow bg-green-700">
            <div class="bg-white p-10 rounded-tl-3xl rounded-bl-3xl shadow-xl min-h-full">
                <h1 class="text-green-900 text-3xl font-bold mb-6">Daftar Akun Pengguna Pegawai dan Atasan</h1>
                <hr class="border-t-2 border-gray-200 my-6">

                <!-- Table for Atasan -->
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-2">Data Atasan</h2>
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
                                        <button type="button" onclick="window.location='{{ route('admin.edit', ['nip' => $atas->nip]) }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded"> Ubah </button>
                                        <button type="button" onclick="window.location='{{ route('admin.edit', ['nip' => $atas->nip]) }}'" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded"> Hapus </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Table for Pegawai -->
                    <h2 class="text-2xl font-bold mb-2">Data Pegawai</h2>
                    <button type="button" onclick="window.location='{{ route('register.register') }}'" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded top-0 right-0"> + tambah data </button> //make different view for input the pegawai's data and change the route
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
                                        <button type="button" onclick="window.location='{{ route('admin.edit', ['nip' => $peg->nip]) }}'" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded"> Hapus </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</body>
</html>

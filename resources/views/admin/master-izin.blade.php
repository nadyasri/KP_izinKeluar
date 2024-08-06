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
                <h1 class="text-green-900 text-3xl font-bold mb-6">Riwayat Pengajuan Surat Izin Keluar Kantor</h1>
                <hr class="border-t-2 border-gray-200 my-6">
                
                <!-- Filter content -->
                <form method="GET" action="{{ route('admin.master-izin') }}">
                    <div>
                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP:</label>
                        <input type="text" name="nip" id="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ request('nip') }}">
                    </div>
                    <div>
                        <label for="tanggal" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal:</label>
                        <input type="text" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ request('tanggal') }}">
                    </div>
                    <div>
                        <button type="button" onclick="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded mb-2 mt-2"> Filter </button>
                        <button type="button" onclick="window.location='{{ route('admin.master-izin') }}'" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded mb-2 mt-2"> Reset </a>
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
                                    <th class="py-3 px-6 text-center">Nama Depan</th>
                                    <th class="py-3 px-6 text-center">Nama Belakang</th>
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
                                    <td class="py-3 px-3 text-center">{{ $d->namaDepan }}</td>
                                    <td class="py-3 px-3 text-center">{{ $d->namaBelakang }}</td>
                                    <td class="py-3 px-3 text-center">{{ $d->keperluan }}</td>
                                    <td class="py-3 px-3 text-center">{{ $d->status }}</td>
                                    <td class="py-3 px-3 text-center">
                                        <button type="button" onclick="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded"> Lihat </button>
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

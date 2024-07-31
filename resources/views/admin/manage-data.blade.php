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
                <button type="button" onclick="window.location='{{ route('admin.edit', ['nip' => $user->nip]) }}'" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded top-0 right-0"> + tambah data </button>
                
                <!-- Table for Atasan -->
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-2">Data Atasan</h2>
                    <div class="overflow-x-auto mb-8">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-center border-b border-gray-300">No</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">NIP</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Nama Depan</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Nama Belakang</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Jabatan</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Gol.</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Username</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Password</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atasan as $atas)
                                <tr>
                                    <td class="py-2 px-2 text-center border-r border-gray-300">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-3 text-center border-r border-gray-300">{{ $atas->nip }}</td>
                                    <td class="py-3 px-3 text-center border-r border-gray-300">{{ $atas->namaDepan }}</td>
                                    <td class="py-3 px-3 text-center border-r border-gray-300">{{ $atas->namaBelakang }}</td>
                                    <td class="py-3 px-3 text-center border-r border-gray-300">{{ $atas->jabatan }}</td>
                                    <td class="py-3 px-3 text-center border-r border-gray-300">{{ $atas->pangkat }}</td>
                                    <td class="py-3 px-3 text-center border-r border-gray-300">{{ $atas->username }}</td>
                                    <td class="py-3 px-3 text-center border-r border-gray-300">{{ $atas->decrypted_password}}</td>
                                    <td class="py-3 px-3 text-center border-r border-gray-300">
                                    <button type="button" onclick="window.location='{{ route('atasan.edit', ['nip' => $user->nip]) }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded"> Ubah </button>
                                    <button type="button" onclick="window.location='{{ route('atasan.edit', ['nip' => $user->nip]) }}'" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded"> Hapus </button>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                        
                <!-- Table for Pegawai -->
                    <h2 class="text-2xl font-bold mb-2">Data Pegawai</h2>
                    <div class="overflow-x-auto mb-8">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-2 px-6 text-center border-b border-gray-300">No</th>
                                    <th class="py-2 px-6 text-center border-b border-gray-300">Atasan</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">NIP</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Nama Depan</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Nama Belakang</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Jabatan</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Gol.</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Username</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Password</th>
                                    <th class="py-3 px-6 text-center border-b border-gray-300">Aksi</th>
                                </tr>
                            </thead>
                            <tbody
                                @foreach ($pegawai as $peg)
                                <tr>
                                    <td class="py-3 px-6 text-center border-r border-gray-300">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-6 text-center border-r border-gray-300">{{ $peg->id_atasan }}</td>
                                    <td class="py-3 px-6 text-center border-r border-gray-300">{{ $peg->nip }}</td>
                                    <td class="py-3 px-6 text-center border-r border-gray-300">{{ $peg->namaDepan }}</td>
                                    <td class="py-3 px-6 text-center border-r border-gray-300">{{ $peg->namaBelakang }}</td>
                                    <td class="py-3 px-6 text-center border-r border-gray-300">{{ $peg->jabatan }}</td>
                                    <td class="py-3 px-6 text-center border-r border-gray-300">{{ $peg->pangkat }}</td>
                                    <td class="py-3 px-6 text-center border-r border-gray-300">{{ $peg->username }}</td>
                                    <td class="py-3 px-6 text-center border-r border-gray-300">{{ $peg->decrypted_password }}</td>
                                    <td class="py-3 px-3 text-center border-r border-gray-300">
                                    <button onclick=" " class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded"> Ubah </button>
                                    <button onclick=" " class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded"> Hapus </button>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fetch data from the backend
        axios.get('/data')
            .then(response => {
                const atasanList = document.getElementById('atasan-list');
                const pegawaiList = document.getElementById('pegawai-list');

                // Populate atasan list
                response.data.atasan.forEach(atasan => {
                    const atasanElement = document.createElement('div');
                    atasanElement.innerHTML = `
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">${atasan.name}</h5>
                                <p class="card-text">Username: ${atasan.username}</p>
                                <button class="btn btn-primary" onclick="editAtasan(${atasan.id})">Edit</button>
                                <button class="btn btn-danger" onclick="deleteAtasan(${atasan.id})">Delete</button>
                            </div>
                        </div>
                    `;
                    atasanList.appendChild(atasanElement);
                });

                // Populate pegawai list
                response.data.pegawai.forEach(pegawai => {
                    const pegawaiElement = document.createElement('div');
                    pegawaiElement.innerHTML = `
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">${pegawai.name}</h5>
                                <p class="card-text">Username: ${pegawai.username}</p>
                                <button class="btn btn-primary" onclick="editPegawai(${pegawai.id})">Edit</button>
                                <button class="btn btn-danger" onclick="deletePegawai(${pegawai.id})">Delete</button>
                            </div>
                        </div>
                    `;
                    pegawaiList.appendChild(pegawaiElement);
                });
            });

        window.editAtasan = function (id) {
            // Implement edit functionality
        }

        window.deleteAtasan = function (id) {
            if (confirm('Are you sure you want to delete this atasan?')) {
                axios.delete(`/atasan/${id}`)
                    .then(response => {
                        alert(response.data.message);
                        location.reload();
                    })
                    .catch(error => {
                        console.error(error);
                        alert('An error occurred while deleting the atasan.');
                    });
            }
        }

        window.editPegawai = function (id) {
            // Implement edit functionality
        }

        window.deletePegawai = function (id) {
            if (confirm('Are you sure you want to delete this pegawai?')) {
                axios.delete(`/pegawai/${id}`)
                    .then(response => {
                        alert(response.data.message);
                        location.reload();
                    })
                    .catch(error => {
                        console.error(error);
                        alert('An error occurred while deleting the pegawai.');
                    });
            }
        }
    });
    </script>

</body>
</html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You are logged in as {{ ucfirst(Crypt::decryptString($data->name)) }}
                </div>
                <table border="2" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Father</th>
                            <th>Mobile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><center>{{ ucfirst(Crypt::decryptString($data->name)) }}</center></td>
                            <td><center>{{ $data->email }}</center></td>
                            <td><center>{{ ucfirst($data->father_name) }}</center></td>
                            <td><center>{{ $data->mobile }}</center></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

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
                    You are logged in as {{  ucfirst(Crypt::decryptString($data['name']))  }}
                </div>
                <table border="2" width="100%">
                    <tbody>
                        <tr>
                            <td>Name: {{ ucfirst(Crypt::decryptString($data['name'])) }}</td>
                            <td>Email: {{ $data['email'] }}</td>
                            <td>Mobile: {{ $data['mobile'] }}</td>
                        </tr>
                        <tr><td colspan="5" style="border-top: 2px solid #000">Student Details</td></tr>
                        @if(!empty($data['get_student']))
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Father Name</th>
                            <th>Mobile</th>
                            <th>Delete</th>
                        </tr>
                            @for( $i=0; $i<count($data['get_student']); $i++ )
                                <tr class="child_row">
                                    <td>
                                        {{ ucfirst(Crypt::decryptString($data['get_student'][$i]['name'])) }}
                                    </td>
                                    <td>
                                        {{ $data['get_student'][$i]['email'] }}
                                    </td>
                                    <td>
                                        {{ ucfirst($data['get_student'][$i]['father_name']) }}
                                    </td>
                                    <td>
                                        {{ $data['get_student'][$i]['mobile'] }}
                                    </td>
                                    <td>
                                        <a href="/teacher/delete/{{ $data['get_student'][$i]['id'] }}">
                                            <button style="background-color: red; border-radius: 5px;padding: 2px; margin-bottom: 10px; color:#fff">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endfor
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

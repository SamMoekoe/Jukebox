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
                @foreach($songs as $key => $data)
                    <tr>
                    <th style='color=blue'>{{$data->title}}</th>    
                    <th>{{$data->artist}}</th>  
                    <th>{{$data->album}}</th>  
                    <a href="/songdetails/<?= $data->id; ?>" style="padding: 5px; border-width: 2px;">{{$data->name}}</a></br></br>
                    </tr>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

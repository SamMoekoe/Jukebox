<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @foreach ($name as $data)
            <b>{{$data->title}}</b>
            <a href="/storename/{{$data->id}}" style="padding: 5px; border-width: 2px; float:right;">Rename</a>
            @endforeach
            @php $duration = 0
            @endphp
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($select as $key => $info)
                        @foreach ($song as $keys => $data)
                            @if ($data->id == $info->songid)
                                {{$key + 1}}<br>
                                <b>Title:</b> {{$data->title}}
                                <b>Duration:</b> {{$data->duration}}s<br>
                                <b>Album:</b> {{$data->album}}
                                <b>Artist:</b> {{$data->artist}}
                                
                                @php
                                    $duration = $duration + $data->duration
                                @endphp
                            @endif
                        @endforeach
                        <a href="/deletesong/{{$info->id}}" style="padding: 5px; border-width: 2px; float:right;">Remove</a>
                        <a href="/songdetail/{{$info->songid}}" style="padding: 5px; border-width: 2px; float:right">Details</a></br></br>
                    @endforeach
                    <b>Total Duration: {{$duration}} seconds</b>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
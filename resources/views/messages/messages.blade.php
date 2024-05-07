<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Text team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="title_liste">Select your team who you need to send a message</h1>
                <br>
                <h1 class="title_team"> <u>Your team</u> :</h1>

                <br>
                @foreach($team as $cle)
                @if($cle->user_id == Auth::user()->id )
                <br>
                <div class="team">

                    <a class="a" href="{{route('message',['id'=>$cle->id])}}">{{$cle->name}}</a>

                </div>
                @endif
                @endforeach
                <br>
                <br>
                <h1 class="title_team"><u>The team that you are invited</u></h1>

                <br>
                @foreach($team as $key)
                @foreach($teams as $keys)
                @if( $keys->user_id == Auth::user()->id && $keys->team_id == $key->id)
                <br>
                <div class="team_invit">
                    <a class="a" href="{{route('message',['id'=>$key->id])}}">{{$key->name}}</a>


                </div>


                @endif
                @endforeach
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Text for ') }} {{$id->name}} team
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="">
            <div class="">
                <div class="box_message">


                    @foreach($msg as $key)
                    <div class="message">
                        @if($key->team_id == $id->id )

                    </div>

                    @if($key->user_id == Auth::user()->id)
                    <div class="id_message">
                        {{$key->message}}

                    </div>
                    <br>
                    @else
                    <div class="message_recu">
                        {{$key->message}}
                    </div>


                    @endif
                    @endif
                    @endforeach

                    <center>
                        <form action="{{route('message.send')}}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$id->id}}">
                            <input type="text" placeholder="écrivez ici votre message" name="msg" id="input">
                            <br>
                            <input class="btn " type="submit" value="Envoyer">
                        </form>
                    </center>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>
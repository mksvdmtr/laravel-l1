@extends('layouts.app')
@section('title')
    Все сообщения
@endsection
@section('content')
    <h2 xmlns="http://www.w3.org/1999/html">Все сообщения</h2>
    @foreach($data as $message)
        <div class="alert alert-info">
            <h3>{{ $message->subject }}</h3>
            <p>{{ $message->email }}</p>
            <p><small>{{$message->created_at}}</small></p>
            <a href="{{ route('contact-data-one', $message->id) }}"><button class="btn btn-warning">Детальнее</button></a>
         </div>
    @endforeach
@endsection

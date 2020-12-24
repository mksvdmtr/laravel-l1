@extends('layouts.app')
@section('title')
    Редактирование записи
@endsection
@section('content')
    <h2>Редактирование записи</h2>

    <form action="{{ route('contact-update-submit', $data->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" value="{{ $data->name }}" placeholder="Вася" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ $data->email }}" placeholder="box@mail.org" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="subject">Тема сообщения</label>
            <input type="text" name="subject" value="{{ $data->subject }}" id="subject" class="form-control">
        </div>
        <div class="form-group">
            <label for="message">Сообщение</label>
            <textarea name="message" id="message" cols="30" rows="5" class="form-control">{{ $data->message }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Обновить</button>
    </form>
@endsection
@section('aside')
    @parent
    <p>Contacts</p>
@endsection

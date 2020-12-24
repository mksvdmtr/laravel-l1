@extends('layouts.app')
@section('title')
    Contacts
@endsection
@section('content')
    <h2>Contacts</h2>



    <form action="{{ route('contact-form') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" placeholder="Вася" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="box@mail.org" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="subject">Тема сообщения</label>
            <input type="text" name="subject" id="subject" class="form-control">
        </div>
        <div class="form-group">
            <label for="message">Сообщение</label>
            <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
@endsection
@section('aside')
    @parent
    <p>Contacts</p>
@endsection

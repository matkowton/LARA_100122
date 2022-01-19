@extends('layouts.main')

@section('title')
    @parent
    Новости
@endsection

@section('content')
<div>
    @forelse($news as $id => $item)
        <div>
            <a href='{{route('news::card', ['id' => $id])}}'> {!! $item['title'] !!} </a>
        </div>
    @empty
        Новостей нет!!!
    @endforelse
</div>
@endsection

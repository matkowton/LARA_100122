@extends('layouts.main')

@section('title')
    @parent
    Новости
@endsection

@section('content')
<div>
    @forelse($news as $item)
        <div>
            <a href='{{route('news::card', ['news' => $item->id])}}'> {!! $item->title !!} </a>
        </div>
    @empty
        Новостей нет!!!
    @endforelse
</div>
@endsection

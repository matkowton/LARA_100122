@extends('layouts.main')

@section('title')
    @parent
    Новости
@endsection

@section('content')
<div>
<div>
    Загол1222:
    {{$item['title']}}
</div>
    <div>
        {{$item['description']}}
    </div>
</div>
@endsection

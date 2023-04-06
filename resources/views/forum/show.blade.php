@extends('layout')
@section('title', 'Article')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="">{{ $article->title }}</h1>
                <p>{{ $article->body }}</p>
                @if (Auth::user()->id == $article->user_id)
                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-secondary w-100">@lang('lang.edit')</a>
                    <form method="post" action="{{ route('article.delete', $article->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 mt-2">@lang('lang.delete')</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection

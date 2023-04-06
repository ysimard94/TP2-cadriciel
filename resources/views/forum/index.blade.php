@extends('layout')
@section('title', 'Forum')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                    @lang('lang.create_article')
                </h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('article.create') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <select name="language_id" id="language_id" class="form-select">
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->language }}</option>
                        @endforeach
                    </select>
                    <br>
                    <input type="text" class="form-control" name="title" id="title"
                        placeholder="@lang('lang.title')">
                    @if ($errors->has('title'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <br>
                    <textarea class="form-control" id="body" name="body" rows="3" placeholder="@lang('lang.body')"></textarea>
                    @if ($errors->has('body'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                    <br>
                    <button type="submit" class="btn btn-primary w-100">@lang('lang.submit')</button>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @lang('lang.articles')
                    </div>
                    <div class="card-body">
                        <ul>
                            @forelse($articles as $article)
                                @if (App::getLocale() == $article->language->language)
                                    <li class="mt-2">
                                        <a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a>
                                    </li>
                                @endif
                            @empty
                                <li>@lang('lang.no_article')</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout')
@section('title', 'Edit File')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        @lang('lang.success_update')
                    </div>
                @endif
                <h1>@lang('lang.edit_informations')</h1>
                <form action="{{ route('file.update', $file->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <select name="language_id" id="language_id" class="form-select">
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}" {{ $language->id == $file->language_id ? 'selected' : '' }}>
                                {{ $language->language }}</option>
                        @endforeach
                    </select>
                    <br>
                    <input type="text" class="form-control" name="name" id="name" placeholder="@lang('lang.title')"
                        value="{{ $file->name }}">
                    @if ($errors->has('name'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <br>
                    <button type="submit" class="btn btn-primary w-100">@lang('lang.submit')</button>
                </form>
            </div>
        </div>
    </div>
@endsection

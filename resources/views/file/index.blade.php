@extends('layout')
@section('title', 'Files')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                    @lang('lang.insert_file')
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        @lang('lang.success_upload')
                    </div>
                @elseif (session()->has('success_delete'))
                    <div class="alert alert-danger">
                        @lang('lang.success_delete')
                    </div>
                @elseif (session()->has('file_not_found'))
                    <div class="alert alert-danger">
                        @lang('lang.file_not_found')
                    </div>
                @endif
                <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <select name="language_id" id="language_id" class="form-select">
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->language }}</option>
                        @endforeach
                    </select>
                    <br>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="@lang('lang.title')">
                    @if ($errors->has('name'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <br>
                    <small>@lang('lang.accepted_ext') pdf, docx, doc, zip. Max 2MB</small>
                    <input type="file" class="form-control" name="file" id="file">
                    @if ($errors->has('file'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('file') }}
                        </div>
                    @endif
                    <br>
                    <button type="submit" class="btn btn-primary w-100">@lang('lang.submit')</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @lang('lang.files')
                    </div>
                    <div class="card-body">
                        <ul>
                            @forelse($files as $file)
                                @if (App::getLocale() == $file->language->language)
                                    <li class="mt-2">
                                        <a href="{{ asset($file->path) }}">{{ $file->name }}</a>
                                        <form action="{{ route('file.delete', $file->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('file.edit', $file->id) }}"
                                                class="btn btn-primary">@lang('lang.edit')</a>
                                            <button type="submit" class="btn btn-danger">@lang('lang.delete')</button>
                                        </form>
                                    </li>
                                @endif
                            @empty
                                <li>@lang('lang.no_file')</li>
                            @endforelse
                            <div class="mt-3">
                                {!! $files->links() !!}
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

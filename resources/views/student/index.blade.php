@extends('layout')
@section('title', 'Student list')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @lang('lang.student_list')
                    </div>
                    <div class="card-body">
                        <ul>
                            @forelse($students as $student)
                                <li class="mt-2">{{ $student->name }}
                                    @if (Auth::user())
                                        @if (Auth::user()->id == $student->user_id)
                                            <a href="{{ route('student.show', $student->id) }}"
                                                class="btn btn-outline-success">@lang('lang.see_more')</a>
                                        @endif
                                    @endif
                                </li>
                            @empty
                                <li>There are currently no students enlisted</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

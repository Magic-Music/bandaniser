@extends('layouts.app')

@section('content')
    <div class="lead bg-date py-1 px-4">
        <button class="btn btn-sm btn-secondary btn-round"><span class="h6">◄</span></button>
{{--        {{ $year }}--}}2023
        <button class="btn btn-sm btn-secondary btn-round"><span class="h6">►</span></button>
        <span class="p-3"></span>
        <button class="btn btn-sm btn-secondary btn-round"><span class="h6">◄</span></button>
{{--        {{ $monthName($month) }}--}}November
        <button class="btn btn-sm btn-secondary btn-round"><span class="h6">►</span></button>
    </div>
    <div class="h-100" id="calendar">
        <x-month year="2023" month="11" />
    </div>
@endsection

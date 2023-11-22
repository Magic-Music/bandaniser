@extends('layouts.app')

@section('content')
    <div class="lead bg-date py-1 px-4">
        <button class="btn btn-sm btn-secondary btn-round"><span class="h6">◄</span></button>
        {{ $year }}
        <button class="btn btn-sm btn-secondary btn-round"><span class="h6">►</span></button>
        <span class="p-3"></span>
        <button class="btn btn-sm btn-secondary btn-round"><span class="h6">◄</span></button>
        {{ $monthName}}
        <button class="btn btn-sm btn-secondary btn-round"><span class="h6">►</span></button>
    </div>
    <div class="h-100" id="calendar">
        <x-month :$year :$month :$gigs :$availability :$rehearsals/>
    </div>
@endsection

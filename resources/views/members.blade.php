@extends('layouts/app')

@section('content')
    <div class="container py-4">
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-header">Band Members</div>
            <div class="card-body">
                <div id="member-table"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        window.onload = () => {
            let memberTable = Tabulate('member-table', {
                data: {!! $members !!},
                columns: [
                    {title:"Name", field: "name", sorter: "string"},
                    {title:"Email", field: "email", sorter: "string"},
                ]
            })
        }
    </script>
@endsection

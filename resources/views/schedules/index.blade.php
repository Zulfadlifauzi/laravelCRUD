@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Schedule Index') }}</div>
                <div class="card-body">
                    <table class='table'>
                        <thead>
                            <th>ID</th>
                            <th>Title<th>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                            <tr>
                            <td>{{$schedule->id}}<td>
                            <td>{{$schedule->title}}<td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

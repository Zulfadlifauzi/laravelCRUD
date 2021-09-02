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
                            <th>Title</th>
                            <th>User</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                            <tr>
                            <td>{{$schedule->id}}</td>
                            <td>{{$schedule->title}}</td>
                            <td>{{$schedule->user->name}}</td>
                            <td>{{$schedule->description}}</td>
                            <td>
                            <a href="{{ route('schedule:show',$schedule) }}" class='btn btn-primary'>Show</a>
                            <a href="{{ route('schedule:edit',$schedule) }}" class='btn btn-success'>Edit</a>
                            <a onclick="return confirm('Are you sure?')" href="{{ route('schedule:destroy', $schedule) }}" class='btn btn-danger'>Delete</a>
                            </td>
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

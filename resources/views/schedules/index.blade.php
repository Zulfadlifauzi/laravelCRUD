@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session()->has('alert'))
                <div class="alert {{ session()->get('alert-type') }}" role="alert">
                    {{ session()->get('alert') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Schedule Index') }}</div>
                
                <div class="card-body">
                    <table class='table'>
                        <thead>
                            <th>ID</th>
                            <th>User</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                            <tr>
                            <td>{{$schedule->id}}</td>
                            <td>{{$schedule->user->name}}</td>
                            <td>{{$schedule->title}}</td>
                            <td>{{$schedule->description}}</td>
                            <td>
                            <a href="{{ route('schedule:show',$schedule) }}" class='btn btn-primary'>Show</a>
                            <a href="{{ route('schedule:edit',$schedule) }}" class='btn btn-success'>Edit</a>
                            <a onclick="return confirm('Are you sure?')" href="{{ route('schedule:destroy', $schedule) }}" class='btn btn-danger'>Delete</a>
                            <a onclick="return confirm('Are you sure want to force delete?')" href="{{ route('schedule:force-destroy', $schedule) }}" class='btn btn-danger'>Force Delete</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$schedules->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

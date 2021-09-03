@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
                        <h1 class="mt-4">Schedule Index</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Schedule</li>
                        </ol>
                        <div class="row">
<div class="container">
        <div class="col-md-12">
        @if(session()->has('alert'))
                <div class="alert {{ session()->get('alert-type') }}" role="alert">
                    {{ session()->get('alert') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    {{ __('Schedule Index') }}
                    <div class='float-right'>
                        <form action='' method=''>
                            <div class='input-group'>
                                <input type='text' class='form-control' name='keyword' value='{{request()->get('keyword')}}'/>
                                <div class='input-group-append'>
                                    <button class='btn btn-primary' type='submit'>Search</button>
                                </div>      
                            </div>
                        </form>
                    </div>      
                </div>
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

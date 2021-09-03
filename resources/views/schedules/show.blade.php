@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Schedule Show') }}</div>

                <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value='{{ $schedule->title }}' readonly>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" readonly>{{$schedule->description}}</textarea>
                        </div>
                        @if($schedule->attachment)
                        <div class='form-group'>
                            <label>Attachment (if any)</label>
                            <a 
                            target='_blank' 
                            href='{{asset('storage/'.$schedule->attachment)}}' 
                            class='btn btn-warning'>
                            Open this attachment:{{$schedule->attachment}}</a>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
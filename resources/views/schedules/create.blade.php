@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Schedule create') }}</div>
                
                <div class="card-body">
                    <form action='' method='POST'>
                        <div class='form-group'>
                            <label>Title</label>
                            <input type='text' name='title' class='form-control'/>
                        </div>    
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name='description' class='form-control'></textarea>
                        </div>
                        <div class='form-group'>
                            <button type='submit' class='btn btn-primary'>Create New Schedules</button> 
                            <a class='btn btn-link' href='{{route('schedule:index')}}'>Back</a>
                         </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


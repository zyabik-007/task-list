@extends('layouts.app')

@section('content')
    <form method="post" action="{{\App\Helper::url('task/store')}}">
        @if(isset($task->id))
            <input type="hidden" name="id" value="{{$task->id}}">
        @endif
        <div class="input-group mb-3">
            <input type="text" maxlength="255" name="name" class="form-control" placeholder="name" aria-label="name"
                   aria-describedby="basic-addon1"
                   value="{{isset($task->name)?$task->name:''}}"
            >
        </div>
        <div class="input-group mb-3">
            <input type="email" name="email" maxlength="255" class="form-control" placeholder="email" aria-label="email"
                   aria-describedby="basic-addon1"
                   value="{{isset($task->email)?$task->email:''}}"
            >
        </div>
        <div class="input-group mb-3">
            <textarea name="description" class="form-control" placeholder="description"
                      aria-label="description"
                      aria-describedby="basic-addon1">{{isset($task->description)?$task->description:''}}</textarea>
        </div>

        @if(isset($task->id))
            <div class="form-check">
                <input class="form-check-input" type="checkbox"
                       @if($task->status==='done')
                       checked
                       @endIf
                       name="status" id="flexCheckDefaultStatus">
                <label class="form-check-label" for="flexCheckDefaultStatus">
                    Is done
                </label>
            </div>
        @else
            <input type="hidden" name="status" value="off">
        @endif
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
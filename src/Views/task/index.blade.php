@extends('layouts.app')

@section('content')
    @if (!empty($tasks))
        @include('paginate')
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Email</th>
                <th scope="col">Description</th>
                @if(\App\Helper::isAdmin())
                    <th scope="col"></th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td> {{$task->name}}</td>
                    <td> {{$task->status}}</td>
                    <td> {{$task->email}}</td>
                    <td> {{$task->description}}</td>
                    @if(\App\Helper::isAdmin())
                        <td>
                            <a href="{{\App\Helper::url('edit/'.$task->id)}}">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('paginate')
    @endif
@endsection
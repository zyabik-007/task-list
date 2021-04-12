@extends('layouts.app')

@section('content')
    @if (!empty($tasks))
        @include('paginate')
        <table class="table">
            <thead>
            <tr>
                <th class="col-2">Name
                    <a href="{{\App\Helper::urlWithParameters('',['name_sort'=>'asc'],true,false)}}"
                       class="bi bi-sort-up"></a>
                    <a href="{{\App\Helper::urlWithParameters('',['name_sort'=>'desc'],true,false)}}"
                       class="bi bi-sort-down"></a>
                </th>
                <th class="col-2">Status
                    <a href="{{\App\Helper::urlWithParameters('',['status_sort'=>'asc'],true,false)}}"
                       class="bi bi-sort-up"></a>
                    <a href="{{\App\Helper::urlWithParameters('',['status_sort'=>'desc'],true,false)}}"
                       class="bi bi-sort-down"></a>

                </th>
                <th class="col-2">Email
                    <a href="{{\App\Helper::urlWithParameters('',['email_sort'=>'asc'],true,false)}}"
                       class="bi bi-sort-up"></a>
                    <a href="{{\App\Helper::urlWithParameters('',['email_sort'=>'desc'],true,false)}}"
                       class="bi bi-sort-down"></a>
                </th>
                <th class="col">Description</th>
                @if(\App\Helper::isAdmin())
                    <th></th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td> {{$task->name}}</td>
                    <td> {{$task->status}}
                        @if($task->created_at!=$task->updated_at)
                            <div>edited by admin</div>
                        @endif
                    </td>
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
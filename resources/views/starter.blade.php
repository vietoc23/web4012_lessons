@extends('layouts')

@section('title', 'Danh sách người dùng')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh sách người dùng
                <small>Danh sách người dùng</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            @if(empty($users))
                <p>No data</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Birthday</th>
                            <td><a href="{{ route('users.create') }}" class="btn btn-success">Create</a></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->birthday }}</td>
                                <td><a href="{{ url('users/' . $user->id) }}" class="btn btn-success">Details</a></td>
                                <td><a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-primary">Update</a></td>
                                <td>
                                    <form action="{{ url('users/' . $user->id . '/delete') }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </section>
        <!-- /.content -->
    </div>
@endsection
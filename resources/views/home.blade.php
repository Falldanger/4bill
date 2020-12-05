@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(isset($users))
                <div class="col-md-10">
                    <H4>Users Table</H4>
                    <table id="usersTable">
                        <tr>
                            <th>Id</th>
                            <th>User name</th>
                            <th>Role</th>
                            <th>Login</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Birthday</th>
                            <th>About</th>
                            <th>Created at</th>
                            <th>Deleted at</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($users as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td> {{$data->name}}</td>
                                <td>
                                    @if($data->role->first())
                                        {{$data->role->first()->role_name}}
                                    @else
                                        Undefined role
                                    @endif
                                </td>
                                <td>{{$data->login}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->date_of_birth}}</td>
                                <td>{{$data->about}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->deleted_at}}</td>
                                <td>
                                    @if($data->deleted_at===null)
                                        <form action="{{ route('deleteUser',$data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center pt-4" class="li: { list-style: none; }">
                            {{ $users->onEachSide(3)->links() }}
                        </div>
                    </div>
                </div>
            @endif
            @if(isset($userInfo))
                <div class="col-md-10">
                    <H4>User info</H4>
                    <span>Name : {{$userInfo->name}}</span><br>
                    <span>Login : {{$userInfo->login}}</span><br>
                    <span>Email : {{$userInfo->email}}</span><br>
                    <span>Phone : {{$userInfo->phone}}</span><br>
                    <span>Birthday : {{$userInfo->date_of_birth}}</span><br>
                    <span>About : {{$userInfo->about}}</span><br>
                    <span>Registration date : {{$userInfo->created_at}}</span><br>
                </div>
            @endif
        </div>
    </div>
@endsection

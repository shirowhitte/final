@extends('layouts.app')

@section('content')
 
@foreach($profile as $user)
<table>
<tr>
    <td>name</td>
    <td>email</td>
</tr>
<tr>
    <td>{{$user->username}}</td>
    <td>{{$user->email}}</td>
</tr>

</table>
@endforeach



@endsection
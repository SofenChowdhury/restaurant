@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        {{ __('All Foods') }}
                        <span class="float-right">
                            <a href="{{route('food.create')}}">
                                <button class="btn btn-outline-secondary">
                                    Add food
                                </button>
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($foods)>0)
                                @foreach($foods as $key=>$food)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td> <img src="{{asset('images')}}/{{$food->image}}" width="100"> </td>
                                        <td>{{$food->name}}</td>
                                        <td>{{$food->description}}</td>
                                        <td>{{$food->price}}TK</td>
                                        <td>{{$food->category->name}}</td>
                                        <td>
                                            <a href="{{route('food.edit',[$food->id])}}">
                                                <button class="btn btn-outline-success">
                                                    Edit
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="">
                                                <form action="{{route('food.destroy',[$food->id])}}" method="post">@csrf
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-outline-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td>No Food to display</td>
                                <td>
                                    <a href="">
                                        <form action="{{route('food.create')}}">
                                            <button class="btn btn-outline-success">
                                                Create Food
                                            </button>
                                        </form>
                                    </a>
                                </td>
                            @endif
                            </tbody>
                        </table>
                        {{$foods->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

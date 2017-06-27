@extends('front')

@section('title', '| Search')

@section('content')
<div class="container">

    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Category</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $detail)
            <tr>
                <td>{{$detail->name}}</td>
                <td>{{$detail->description}}</td>
                <td>
                    <a href="{{ route('categories.show', $detail->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" title="Show"></i> </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@stop
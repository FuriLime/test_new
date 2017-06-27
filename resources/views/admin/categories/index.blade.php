@extends('admin.main')

@section('title', '| Homepage')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Product Categories <a href="{{route('categories.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th id="name">Category</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($categories))
                            @foreach($categories as $category)
                            <tr class="item-{{$category->id}}">
                                <td>{{$category->name}}</td>
                                <td>{{substr($category->description, 0, 50) }}{{ strlen($category->description) > 50 ? "..." : ""}}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="#" data-id="{{$category->id}}" class="btn button-remove btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
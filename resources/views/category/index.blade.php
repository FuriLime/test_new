@extends('front')

@section('title', '| Homepage')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
            <div class="top-block">
                <div class="x_title col-md-4 col-sm-12">
                    <h2>Product Categories</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="search-box col-md-4 col-sm-12">
                    <form action="/tonti/public/result" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                placeholder="Search category"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($categories))
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    <a href="{{ route('category_show', $category->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" title="Show"></i> </a>
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
            <div class="col-md-12">
                <h2>Most Popular Product</h2>

                @foreach($populars as $popular)
                <div class="post col-md-3">
                    <div class="image-product">
                        <img src ='{{ asset("images/$popular->image") }}'>
                    </div>
                    <div class="col=md-12">
                        <h3>{{ $popular->product_name }}</h3> 
                        <p>{{substr($popular->description, 0, 20) }}{{ strlen($popular->description) > 20 ? "..." : ""}}</p> 
                        <a href="{{ route('product_show', $popular->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" title="Show"></i> </a>       
                    </div>
                </div>
                @endforeach
            </div>        
        </div> 
             
@stop
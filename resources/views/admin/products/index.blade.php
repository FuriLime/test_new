@extends('admin.main')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Products <a href="{{route('product.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th id="cat">Category</th>
                                <th>Image</th>
                                <th id="name">Name</th>
                                <th>Description</th>
                                <th id="price">Price</th>
                                <th>CPU</th>
                                <th>Size</th> 
                                <th>Memory</th>
                                <th id="amount">Amount</th>
                                <th id="create">Created At</th>                                 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($products)
                            @foreach ($products as $product)
                            <tr class="item-{{$product->id}}">
                                <td>{{$product->category->name}}</td>
                                <td><image src ='{{ asset("images/$product->image") }}' width="50" height="50"></td>
                                <td>{{$product->product_name}}</td>
                                <td>{{substr($product->description, 0, 50) }}{{ strlen($product->description) > 50 ? "..." : ""}}</td>
                                <td>                              
                                    {{$product->price}}
                                </td>
                                <td>
                                 @if($product->infos->cpu)
                                    {{ $product->infos->cpu }}
                                @endif
                                </td>
                                <td>
                                @if($product->infos->size)
                                    {{ $product->infos->size }}
                                @endif
                                </td>
                                <td>
                                @if($product->infos->memory)
                                    {{ $product->infos->memory }}
                                @endif
                                </td>
                                <td>{{ $product->infos->amount }}</td>
                                <td>{{ $product->created_at }}</td>

                                <td>
                                    <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="#" data-id="{{$product->id}}" class="btn button-remove-prod btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@extends('front')

@section('title', '| Product List')

@section('content')
<div class="row">
    <div class="col-md-12">
        @foreach($products as $product)
            <div class="products-info col-md-4">
                <div class="image-product">
                    <img src ='{{ asset("images/$product->image") }}'>
                </div>
                <div class="col=md-12">
                    <h3>{{ $product->product_name }}</h3>
                    <h4>Price  ${{ $product->price }} </h4> 
                    <p>{{substr($product->description, 0, 20) }}{{ strlen($product->description) > 20 ? "..." : ""}}</p> 
                    <a href="{{ route('product_show', $product->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" title="Show"></i> </a>       
                </div>
            </div> 
        @endforeach
    </div>
    {{ $products->links() }}
</div>
      
@stop
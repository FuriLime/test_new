@extends('front')

@section('title', '| Single Product')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="product-info">
            <div class="image-product col-md-4">
                <img src ='{{ asset("images/$product->image") }}'>
            </div>
            <div class="col-md-8">
                <h3>{{ $product->product_name }}</h3>
                <h4>Price  ${{ $product->price }} </h4> 
                <p>{{  $product->description }}</p> 
                @if($product->infos)
                    <h3>More Info</h3>
                    @if($product->infos->cpu)
                    <p>CPU: {{ $product->infos->cpu }}</p>
                    @endif
                    @if($product->infos->memory)
                    <p>Memory: {{ $product->infos->memory }}</p>
                    @endif
                    @if($product->infos->size)
                    <p>Size: {{ $product->infos->size }}</p>
                    @endif
                @endif                  
            </div>
        </div>                
    </div>
    <div class="col-md-12">
        <h2>Look this products</h2>
        @foreach($products as $same)
                <div class="post col-md-3">
                    <div class="image-product">
                        <img src ='{{ asset("images/$same->image") }}'>
                    </div>
                    <div class="col=md-12">
                        <h3>{{ $same->product_name }}</h3> 
                        <p>{{substr($same->description, 0, 20) }}{{ strlen($same->description) > 20 ? "..." : ""}}</p> 
                        <a href="{{ route('product_show', $same->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" title="Show"></i> </a>       
                    </div>
                </div>
                @endforeach

    </div>
</div>       
               
@stop


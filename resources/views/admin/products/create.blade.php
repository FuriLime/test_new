@extends('admin.main')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Product <a href="{{route('product.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('product.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">Category <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="category_id" name="category_id">
                                    @if(count($categories))
                                        @foreach($categories as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('category_id'))
                                <span class="help-block">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Product Image <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" required="required" value="{{ Request::old('image') ?: '' }}" id="image" name="image" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('image'))
                                <span class="help-block">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_name">Product Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" required="required" value="{{ Request::old('product_name') ?: '' }}" id="product_name" name="product_name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('product_name'))
                                <span class="help-block">{{ $errors->first('product_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Product Description
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" required="required" value="{{ Request::old('description') ?: '' }}" id="description" name="description" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('description'))
                                <span class="help-block">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" step="0.01" required="required" value="{{ Request::old('price') ?: '' }}" id="price" name="price" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('price'))
                                <span class="help-block">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cpu') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpu">Cpu</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('cpu') ?: '' }}" id="cpu" name="cpu" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('cpu'))
                                <span class="help-block">{{ $errors->first('cpu') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="size">Size</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('size') ?: '' }}" id="size" name="size" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('size'))
                                <span class="help-block">{{ $errors->first('size') }}</span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('memory') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="memory">Memory</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('memory') ?: '' }}" id="memory" name="memory" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('memory'))
                                <span class="help-block">{{ $errors->first('memory') }}</span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Amount<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" step="1" required="required" value="{{ Request::old('amount') ?: '' }}" id="amount" name="amount" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('amount'))
                                <span class="help-block">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">Create Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@extends('layouts.home')

@section('container')
<h1>Update Product</h1>
<br>
<form method="POST" action="/products/products/{{ $product->product_slug }}">
  @method("put")
  @csrf
    <div class="mb-3">
      <label for="ProductFormName" class="form-label">Product name</label>
      <input class="form-control" type="text" id="name" name="product_name" value="{{ old("product_name", $product->product_name) }}" placeholder="Product Name" aria-label="ProductFormName">
    </div>
    <div class="mb-3">
      <label for="ProductFormPrice" class="form-label">Product price</label>
      <input class="form-control" type="number" id="price" name="price" value="{{ old("price", $product->price) }}" placeholder="10000" aria-label="ProductFormPrice">
    </div>
    <div class="mb-3">
        <label for="ProductFormDescription" class="form-label">Product description</label>
        <textarea class="form-control" id="description" name="description"  placeholder="About" aria-label="ProductFormDescription" rows="3">{{$product->description}}</textarea>
      </div>
      {{-- <input type="text" id="title" value={{ $title }} hidden>
      @if ( $title ==  "Create" )
      <button type="submit" class="btn btn-primary">Add product</button>
      @else --}}
      <button type="submit" class="btn btn-primary">Update</button>
      {{-- <h2>{{ $product->description }}</h2> --}}
      {{-- @endif --}}
  </form>
  {{-- <script src="../js/main.js"></script> --}}
@endsection

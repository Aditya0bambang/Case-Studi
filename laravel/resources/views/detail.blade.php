{{-- @dd($product) --}}

@extends('layouts.home')

@section('container')
{{-- <h1>TESTING</h1> --}}
    <h1>{{ $title }}</h1>
      @if ( count($product->product_asset)>0 )
      @foreach ($product->product_asset->all() as $item_asset)
          <img src={{ $item_asset->asset->path }} width="100px" />
      @endforeach
      @endif
    <p>{{ $product["description"] }}</p>
    <h3>{{ $product["price"] }}</h3>
    <a href="/products/{{ $product->product_slug }}/edit">
        <button type="button" class="btn btn-primary">Edit</button>
    </a>
    <form action="/products/{{ $product->product_slug }}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection

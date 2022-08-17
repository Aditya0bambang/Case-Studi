{{-- @dd($products[0]) --}}

@extends('layouts.home')

{{-- <div class="container ml-4"> --}}
  @section('container')  
  {{-- <h1>{{ $products[0]->product_asset->get(0)->asset }}</h1> --}}
  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif
  @if (session()->has('delete'))
  <div class="alert alert-danger" role="alert">
    {{ session('delete') }}
  </div> 
  @endif
    @foreach ( $products  as  $item )
      <h2> 
        <a href="/products/{{ $item->product_slug }}">
          {{ $item["product_name"] }}  
        </a>
      </h2>  
      <p>{{ $item["description"] }}</p>
      <h4>{{ $item["price"] }}</h4>
      <br />
      {{-- <p> {{ $item }}</p> --}}
      {{-- @if ( count($item->product_asset)>0 )
      @foreach ($item->product_asset->all() as $item_asset)
          <img src={{ $item_asset->asset->path }} width="100px" />
      @endforeach
      @endif --}}

      @endforeach
  @endsection
{{-- </div> --}}
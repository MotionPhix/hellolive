@extends('layouts.app')

@section('title', 'Our Billboards - FirstMark Advertising')
@section('meta_description', 'Explore our extensive network of premium billboard locations across Malawi and Zambia. Find the perfect outdoor advertising space for your brand.')

@section('content')
  <billboard-list
    :initial-billboards='@json($billboards->items())'
    :initial-countries='@json($countries)'
    :initial-cities='@json($cities)'
    :initial-types='@json($types)'
    :initial-filters='@json($filters)'
    :links='@json($billboards->links())'
  />
@endsection

@extends('user.main')

@section('content')

{{-- Hero Section --}}
@include('user/component/section/heroSection')
@include('user/component/section/aboutSection')
@include('user/component/section/pricesSection')
@include('user/component/section/portfolioSection')
@include('user/component/section/partnerSection')
@include('user/component/section/footerSection')

@endsection
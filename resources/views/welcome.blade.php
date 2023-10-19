@extends('layouts.dashbord')

@section('content')

<!-- nav bar -->
@include('client.partials.header')

<!-- carroussel -->
@include('client.partials.carroussel')


<!-- Nos services -->
@include('services.nos_services')

<!-- Nos filières -->
@include('filieres.nosfilieres')





<!-- Nos partenaires -->
@include('partenaires.nos_partenaires')



@endsection
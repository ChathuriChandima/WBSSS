@extends('layouts.log')
@section('content')


{!! Charts::assets() !!}



{!! $bar_chart->render() !!}
{!! $line_chart->render() !!}
{!! $pie_chart->render() !!}
@endsection
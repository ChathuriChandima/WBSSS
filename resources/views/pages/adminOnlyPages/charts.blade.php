@extends('layouts.log')
@section('content')


{!! Charts::assets() !!}

{!! $bar_chart->render() !!}

{!! $line_chart->render() !!}

{!! $line_chart2->render() !!}

{!! $line_chart3->render() !!}

@endsection

@extends('layouts.log')
@section('content')

<!--load chart assets-->
{!! Charts::assets() !!}

<!--display the vehicles per month bar chart-->
{!! $bar_chart->render() !!}

<!--display the monthly income line chart-->
{!! $line_chart->render() !!}

<!-- display the monthly expenses line chart-->
{!! $line_chart2->render() !!}

<!-- display the monthly profit line chart-->
{!! $line_chart3->render() !!}

@endsection

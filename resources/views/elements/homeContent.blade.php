@if (Auth::user()->role === 'admin')
    @include('elements.homecontent.adminHomeContent')
@elseif (Auth::user()->role === 'mechanic')
    @include('elements.homecontent.mechanicHomeContent')
@elseif (Auth::user()->role === 'accountant')
    @include('elements.homecontent.accountantHomeContent')
@else
    @include('elements.homecontent.customerHomeContent')
@endif

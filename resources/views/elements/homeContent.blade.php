@if (Auth::user()->role === 'admin')
    @include('elements.homecontent.adminHomeContent')
@elseif (Auth::user()->role === 'mechanic')
    @include('elements.homecontent.mechanicHomeContent')
@elseif (Auth::user()->role === 'accountant')
    @include('elements.homecontent.accountantHomeContent')
@else
    @include('elements.homecontent.customerHomeContent')
<<<<<<< HEAD
@endif 
=======
@endif
>>>>>>> 304799cbcb5c4c5f772d2f51da209f2e86fb165f

<!DOCTYPE html>
<html lang="en">

    @include('layouts.head')

    <body>

        @include('layouts.navbar')

        <div class="container">

            @yield('content')

        </div>

        @include('layouts.footer')

        @include('layouts.javascript')
    </body>
    
</html>

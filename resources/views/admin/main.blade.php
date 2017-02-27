<!DOCTYPE html>
<html lang="en">

    @include('admin.head')

    <body>

        @include('admin.navbar')

        <div class="container">

            @yield('content')

        </div>

        @include('admin.footer')

        @include('admin.javascript')
    </body>
    
</html>

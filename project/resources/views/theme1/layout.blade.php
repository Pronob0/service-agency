<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('common.meta')
    @include('common.style')
</head>

<body>
    {{-- @include('common.common') --}}
    @if (request()->is('/'))
    @include('common.header')
    @else
    @include('common.header')
    @endif
    
    <main>
        @yield('content')
    </main>
    
    @include('common.footer')
    @include('common.script')
</body>

</html>

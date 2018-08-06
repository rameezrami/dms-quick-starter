<!DOCTYPE html>
<html>
<head>
    <!-- Meta -->
    @yield('meta_tags')

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    @foreach($codeSnippets->openingHeadJs as $js)
        {!! $js->jsCode !!}
    @endforeach

    @yield('styles')

    @foreach($codeSnippets->closingHeadJs as $js)
        {!! $js->jsCode !!}
    @endforeach

</head>
<body >
    @foreach($codeSnippets->openingBodyJs as $js)
        {!! $js->jsCode !!}
    @endforeach

    @include('layout.header')

    @yield('content')

    @yield('scripts')

    @include('layout.footer')

    @foreach($codeSnippets->closingBodyJs as $js)
        {!! $js->jsCode !!}
    @endforeach
</body>
</html>
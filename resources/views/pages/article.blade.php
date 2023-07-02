    @extends('layouts.main')

    @section('content')
    
    
    <!-- Header Start -->
    <x-header name1="Bizning maqolalarimiz" name2="Maqolalar"></x-header>
   
    <!-- Header End -->


    <!-- Blog Start -->
     @include('section.article')
    <!-- Blog End -->

    @endsection
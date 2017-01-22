
@extends ('masterpage')

@section('titel')
  <p>Home</p>
@stop


@section('content')

    <h1>Home-page</h1>

    <h3>Welcome {{$firstname}} {{$lastname}}!</h3>

    <h3>Article overview</h3>

@if (count($articles))
    <ul>

      @foreach ($articles as $article)
        <li> {{$article}} </li>
      @endforeach

    </ul>
@endif


@stop

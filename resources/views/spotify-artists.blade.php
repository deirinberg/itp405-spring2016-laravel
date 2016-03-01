@extends('layout')

@section('content')
  @if (empty($artists))
    <h2>No results for <em>{{ $artist_name }}</em></h2>
    <form action="/spotify" method="get">
        <input type="submit" class="btn btn-default" value="Try Again">
    </form>
  @else
    <form class="back-button" action="/spotify" method="get">
        <input type="submit" class="btn btn-default" value="Back">
    </form>
      @if ($artist_name)
       <h2 class="results-title">You searched for 
          <em>{{ $artist_name }}</em>
       </h2>
      @endif
 	<ul>
    @foreach($artists as $artist)
 	  	<li>
        <a href='/spotify/artists/{{ $artist->id }}'>
 	  	  	@if(count($artist->images) > 1)
 	  	  		<img class='artist-image' src='{{ $artist->images[1]->url }}'/>
          @else
            <img class='artist-image' src='https://lh3.googleusercontent.com/UrY7BAZ-XfXGpfkeWg0zCCeo-7ras4DCoRalC_WXXWTK9q5b0Iw7B0YQMsVxZaNB7DM=w300'/>
          @endif
          <p class='artist-name'>{{ $artist->name }}</p>
          </a>
 	  	</li>
    @endforeach
 	</ul>
  @endif
@endsection

@extends('layout')

@section('content')
  @if (empty($tracks))
    <h2>No results for <em>{{ $artist->name }}</em></h2>
    <button type="button" class="back-button btn btn-default" onclick="history.back(-1);">Back</button>
  @else
     <button type="button" class="back-button btn btn-default" onclick="history.back(-1);">Back</button>
      @if($artist->name)
       <h2 class="results-title"><strong>{{ $artist->name }}</strong> Top Tracks</h2>
      @endif
  <ul>
    @foreach($tracks as $track)
      <li>
        @if ($track->external_urls->spotify)
          <a href='{{ $track->external_urls->spotify }}' target='_blank'>
        @endif

        @if (count($track->album->images) > 1)
          <img class='artist-image' src='{{ $track->album->images[1]->url }}'/>
        @else
          <img class='artist-image' src='https://lh3.googleusercontent.com/UrY7BAZ-XfXGpfkeWg0zCCeo-7ras4DCoRalC_WXXWTK9q5b0Iw7B0YQMsVxZaNB7DM=w300'/>
        @endif
        
        <p class='artist-name'>{{ $track->name }}</p>

        @if($track->external_urls->spotify)
          </a>
        @endif

      </li>
      @endforeach
  </ul>
  @endif
@endsection

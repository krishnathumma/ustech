<div class="col-md-3" style="border: 1px solid #f4f4f4; text-align: center;">
        @if (isset($team->logo_uri))
          <img src="{{ $team->logo_uri }}" class="card-img-top" style="width: 150px; height: 150px;">
        @endif
          <div class="card-body">
            <a href="{{ url('/teams', $team->team_id.'/player') }}">
                <h5 class="card-title">{{ $team->name }}</h5>
            </a>
          </div>
</div>
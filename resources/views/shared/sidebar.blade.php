 <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" style="margin-top: 60px;">
      <div class="list-group list-group-flush">
        <a href="{{ url('/') }}" class="list-group-item list-group-item-action bg-light"><i class="fa fa-home"></i> Home</a>
        <a href="{{ url('/teams') }}" class="list-group-item list-group-item-action bg-light"><i class="fa fa-list"></i> Teams</a>
        <a href="{{ url('/players') }}" class="list-group-item list-group-item-action bg-light"><i class="fa fa-group"></i> Players</a>
        <a href="{{ url('/match') }}" class="list-group-item list-group-item-action bg-light"><i class="fa fa-handshake-o"></i> Matches</a>
        <a href="{{ url('/points') }}" class="list-group-item list-group-item-action bg-light"><i class="fa fa-trophy"></i> Points</a>
        <a href="{{ url('/logout') }}" class="list-group-item list-group-item-action bg-light"><i class="fa fa-sign-out"></i> Logout</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
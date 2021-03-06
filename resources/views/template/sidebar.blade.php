<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">simKP</a>
            <a class="navbar-brand hidden" href="#">KP</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('news.index')}}"> <i class="menu-icon fa fa-paperclip"></i>Berita</a>
                </li>
                @if (Auth::check())
                    @if (Auth::user()->role == 'koordinator')
                        <li>
                            <a href="{{route('period.index')}}"> <i class="menu-icon fa fa-calendar-o"></i>Periode</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="{{route('period.index')}}"> <i class="menu-icon fa fa-calendar-o"></i>Periode</a>
                    </li>
                @endif

                @if (Auth::check())
                    @if (Auth::user()->role == 'mahasiswa')
                        <li>
                            <a href="{{route('group.create')}}"> <i class="menu-icon fa fa-folder"></i>Pengajuan</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="{{route('group.create')}}"> <i class="menu-icon fa fa-folder"></i>Pengajuan</a>
                    </li>
                @endif
                @if (Auth::check())
                    @if (Auth::user()->role != 'tendik')
                        <li>
                            <a href="{{route('group.index')}}"> <i class="menu-icon fa fa-briefcase"></i>Kelompok</a>
                        </li>
                    @endif
                @endif
                @if (Auth::check())
                    @if (Auth::user()->role == 'koordinator')
                        <li>
                            <a href="{{route('user.index')}}"> <i class="menu-icon fa fa-user"></i>Akun</a>
                        </li>
                        <li>
                            <a href="{{route('statistic.show')}}"> <i class="menu-icon fa fa-bar-chart-o"></i>Statistik</a>
                        </li>
                        <li>
                            <a href="{{route('valuation.communal')}}"> <i class="menu-icon fa fa-table"></i>Nilai Integra</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="{{route('user.index')}}"> <i class="menu-icon fa fa-user"></i>Akun</a>
                    </li>
                    <li>
                        <a href="{{url('statistik')}}"> <i class="menu-icon fa fa-bar-chart-o"></i>Statistik</a>
                    </li>
                @endif
                @if (Auth::check())
                    @if (Auth::user()->role == 'tendik')
                        <li>
                            <a href="{{url('cover_letter')}}"> <i class="menu-icon fa fa-envelope"></i>Cover Letter</a>
                        </li>
                    @endif
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>

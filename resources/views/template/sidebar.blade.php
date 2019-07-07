<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="simKP"></a>
            <a class="navbar-brand hidden" href="#"><img src="images/logo2.png" alt="KP"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{url('berita')}}"> <i class="menu-icon fa fa-paperclip"></i>Berita</a>
                </li>
                <li>
                    <a href="{{url('periode')}}"> <i class="menu-icon fa fa-calendar-o"></i>Periode</a>
                </li>
                <li>
                    <a href="{{url('pengajuan')}}"> <i class="menu-icon fa fa-folder"></i>Pengajuan</a>
                </li>
                <li>
                    <a href="{{url('kp')}}"> <i class="menu-icon fa fa-briefcase"></i>Kerja Praktik</a>
                </li>
                <li>
                    <a href="{{url('magang')}}"> <i class="menu-icon fa fa-puzzle-piece"></i>Magang</a>
                </li>
                <li class="menu-item-has-children active dropdown show">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="menu-icon fa fa-tasks"></i>Akun</a>
                    <ul class="sub-menu children dropdown-menu show">
                        <li><i class="menu-icon fa fa-user"></i><a href="{{url('dosbing')}}">Dosen Pembimbing</a></li>
                        <li><i class="menu-icon fa fa-user"></i><a href="{{url('mahasiswa')}}">Mahasiswa</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('statistik')}}"> <i class="menu-icon fa fa-bar-chart-o"></i>Statistik</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
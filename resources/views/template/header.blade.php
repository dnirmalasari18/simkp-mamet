<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-1">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            
        </div>

        <div class="col-sm-11" >
            <div class="user-area dropdown"style="float:right; margin-top:5px;" >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#272c33;">
                    <i class="fa fa-user-circle-o" style="margin-right:3px;"></i>
                    Nama Orang
                    <i class="fa fa-caret-down" style="margin-left:3px;"></i>
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="{{route('reset')}}"><i class="fa fa-key"></i> Ganti Password</a>
                    <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>

            <div class="header-left" style="float:right; margin-right:20px;">

                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">5</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">You have 3 Notification</p>
                        <a class="dropdown-item media bg-flat-color-1" href="#">
                            <i class="fa fa-check"></i>
                            <p>Server #1 overloaded.</p>
                        </a>
                        <a class="dropdown-item media bg-flat-color-4" href="#">
                            <i class="fa fa-info"></i>
                            <p>Server #2 overloaded.</p>
                        </a>
                        <a class="dropdown-item media bg-flat-color-5" href="#">
                            <i class="fa fa-warning"></i>
                            <p>Server #3 overloaded.</p>
                        </a>
                    </div>
                </div>

            </div>

            

        </div>
    </div>

</header>
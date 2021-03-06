<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-1">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            
        </div>

        <div class="col-sm-11" >
            <div class="user-area dropdown"style="float:right; margin-top:5px;" >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#272c33;">
                    <i class="fa fa-user-circle-o" style="margin-right:3px;"></i>
                    @if (Auth::check())
                        {{Auth::user()->fullname}}
                    @else
                        Nama Orang
                    @endif                        
                    <i class="fa fa-caret-down" style="margin-left:3px;"></i>
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="{{route('reset')}}"><i class="fa fa-key"></i> Ganti Password</a>
                    <a class="nav-link" href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>

            <div class="header-left" style="margin-left:-5%;">
                @if (Auth::check())
                    @if (Auth::user()->role == 'mahasiswa')
                    <div class="dropdown for-notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            @if (Auth::user()->notifications->where('is_read',0)->count() > 0)
                                <span class="count bg-danger">{{Auth::user()->notifications->where('is_read',0)->count()}}</span>
                            @endif                        
                        </button>
                        <div class="dropdown-menu" aria-labelledby="notification" style="margin-right:0px;">
                            @if (Auth::user()->notifications->count() > 0)
                                <p class="red">You have {{Auth::user()->notifications->where('is_read',0)->count()}} new notification(s)</p>
                            @else
                                <p class="red">You do not have any notification</p>
                            @endif                        
                            @foreach (Auth::user()->notifications->sortBy('is_read') as $notification)
                                @if ($notification->notifiable_type == 'App\GroupRequest')
                                    <a class="dropdown-item media" href="#">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i>
                                            <strong>Permintaan bergabung</strong>
                                            <span class="pull-right text-muted small">{{$notification->created_at->toDateString()}}</span><br>
                                            from: {{$notification->notifiable->group->students[0]->fullname}}<br>
                                            {{$notification->notifiable->group->corp->name}} - {{$notification->notifiable->group->corp->city}}
                                            <span class="pull-right text-muted small">
                                                @if ($notification->notifiable->status['status'])
                                                    <span class="pull-right text-muted small" >{{ucwords($notification->notifiable->status['name'])}}</span>
                                                @else
                                                <form action="{{route('group.accept')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="req_id" value="{{$notification->notifiable->id}}">
                                                    <input type="hidden" name="notif_id" value="{{$notification->id}}">
                                                    <button type="submit" class="btn btn-primary btn-sm" style="border-radius:3px; width:100px; margin-left:10px;height:1.54rem;padding:.1rem.5rem;margin-left:0;">Accept</button>
                                                </form>
                                                <form action="{{route('group.decline')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$notification->notifiable->id}}">
                                                    <input type="hidden" name="notif_id" value="{{$notification->id}}">
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius:3px; width:100px; margin-left:10px;height:1.54rem;padding:.1rem.5rem;margin-left:0;">Decline</button>
                                                </form>
                                                @endif
                                            </span>
                                        </div>
                                    </a>
                                @elseif($notification->notifiable_type == 'App\Group')
                                    <a class="dropdown-item media" href="#">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i>
                                            <strong>Permintaan Membimbing Kelompok KP Baru</strong>
                                            <span class="pull-right text-muted small">{{$notification->created_at->toDateString()}}</span><br>
                                            Dari: <br> 
                                            @foreach ($notification->notifiable->students as $student)
                                            {{$student->fullname}} <br>
                                            @endforeach
                                            {{$notification->notifiable->corp->name}} - {{$notification->notifiable->corp->city}}
                                            <span class="pull-right text-muted small">
                                                @if ($notification->notifiable->lecturer_id != null)
                                                    <span class="pull-right text-muted small" >{{ucwords($notification->notifiable->status['name'])}}</span>
                                                @else
                                                    <form action="{{route('lecturer.group.accept')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="group_id" value="{{$notification->notifiable->id}}">
                                                        <input type="hidden" name="notif_id" value="{{$notification->id}}">
                                                        <button type="submit" class="btn btn-primary btn-sm" style="border-radius:3px; width:100px; margin-left:10px;height:1.54rem;padding:.1rem.5rem;margin-left:0;">Accept</button>
                                                    </form>
                                                    <form action="{{route('lecturer.group.decline')}}" method="post">
                                                        @csrf                                                    
                                                        <input type="hidden" name="notif_id" value="{{$notification->id}}">
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius:3px; width:100px; margin-left:10px;height:1.54rem;padding:.1rem.5rem;margin-left:0;">Decline</button>
                                                    </form>
                                                @endif
                                            </span>
                                        </div>
                                    </a>
                                @endif                                
                            @endforeach                                                
                        </div>
                    </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</header>
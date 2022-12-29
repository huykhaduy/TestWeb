
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Menu</span></li>
                @foreach($listMenu as $menu)
                    <li class="submenu ">
                        <a href="#"><i class="feather-file-text"></i> <span> {{$menu->name_cate}}</span> <span class="menu-arrow"></span></a>
                        <ul class="d-block">
                            @foreach($menu->subMenu as $sub)
                                <li class="{{ Request::get('chap')== $sub->id ? 'active' : '' }}">
                                    <a href="{{route('showChapter').'?chap='.$sub->id}}">{{$sub->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

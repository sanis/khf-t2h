<!-- BEGIN SIDEBAR MENU -->
<ul class="acc-menu" id="sidebar">

    <li><a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
    <li class="divider"></li>
    <li><a href="javascript:;"><i class="fa fa-rss-square"></i> <span>News & categories</span></a>
        <ul class="acc-menu">
            <li><a href="/news.html">List news</a></li>
            <li><a href="/news.html">Create news</a></li>
            <li class="divider" style="margin: 0px 0px;"></li>
            <li><a href="/news.html">List categories</a></li>
            <li><a href="/news.html">Create category</a></li>
        </ul>
    </li>
    <li><a href="javascript:;"><i class="fa fa-file"></i> <span>Pages</span></a>
        <ul class="acc-menu">
            <li><a href="/news.html">List pages</a></li>
            <li><a href="/news.html">Create new page</a></li>
        </ul>
    </li>
    <li><a href="javascript:;"><i class="fa fa-book"></i> <span>Academic community</span></a>
        <ul class="acc-menu">
            <li><a href="/news.html">List subjects</a></li>
            <li><a href="/news.html">Create new subject</a></li>
            <li class="divider" style="margin: 0px 0px;"></li>
            <li><a href="/news.html">List departments</a></li>
            <li><a href="/news.html">Create new department</a></li>
            <li class="divider" style="margin: 0px 0px;"></li>
            <li><a href="/news.html">List lecture rooms</a></li>
            <li><a href="/news.html">Create new lecture room</a></li>
            <li class="divider" style="margin: 0px 0px;"></li>
            <li><a href="/news.html">List lectures</a></li>
            <li><a href="/news.html">Create new lecture</a></li>
            <li class="divider" style="margin: 0px 0px;"></li>
            <li><a href="/news.html">List semesters</a></li>
            <li><a href="/news.html">Create new semester</a></li>
            <li class="divider" style="margin: 0px 0px;"></li>
            <li><a href="/news.html">List sands</a></li>
            <li><a href="/news.html">Create new sand</a></li>
            <li class="divider" style="margin: 0px 0px;"></li>
            <li><a href="/news.html">List student groups</a></li>
            <li><a href="/news.html">Create new student group</a></li>
            <li class="divider" style="margin: 0px 0px;"></li>
            <li><a href="/news.html">List studies</a></li>
            <li><a href="/news.html">Create new study</a></li>
        </ul>
    </li>
    <li><a href="javascript:;"><i class="fa fa-user"></i> <span>Users & Groups</span></a>
        <ul class="acc-menu">
            <li><a href="{{ URL::route('admin.user.list') }}">List users</a></li>
            <li><a href="{{ URL::route('admin.user.add') }}">Create new user</a></li>
            <li class="divider" style="margin: 0px 0px;"></li>
            <li><a href="{{ URL::route('admin.group.list') }}">List groups</a></li>
            <li><a href="{{ URL::route('admin.group.add') }}">Create new group</a></li>
            <li class="divider" style="margin: 0px 0px;"></li>
            <li><a href="/news.html">List teachers</a></li>
            <li><a href="/news.html">Create new teacher</a></li>
        </ul>
    </li>
    <li><a href="javascript:;"><i class="fa fa-calendar"></i> <span>Events</span></a>
        <ul class="acc-menu">
            <li><a href="/news.html">List events</a></li>
            <li><a href="/news.html">Create new event</a></li>
        </ul>
    </li>
    <li><a href="javascript:;"><i class="fa fa-wrench"></i> <span>Site settings</span></a>
        <ul class="acc-menu">
            <li><a href="/news.html">Menus</a></li>
            <li><a href="/news.html">Other settings</a></li>
        </ul>
    </li>
</ul>
<!-- END SIDEBAR MENU -->
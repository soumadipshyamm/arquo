<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-title">Arc Trans</div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
            data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="<%=(mainUri==='dashboard')?'nav-active':''%>">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-parent <%=(mainUri==='passcode')?'nav-expanded':''%>">
                        <a href="javascript:void(0)">
                            <i class="fa fa-solid fa-cube"></i>
                            <span>Passcode Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="<%=(subUri==='list')?'nav-active':''%>">
                                <a href="{{ route('admin.package.add-plan') }}"> Add Passcode </a>
                            </li>
                            <li class="<%=(subUri==='add')?'nav-active':''%>">
                                <a href="{{ route('admin.package.package-list') }}"> View Passcode </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent <%=(mainUri==='route')?'nav-expanded':''%>">
                        <a href="javascript:void(0)">
                            <i class="fa far fa-map"></i>
                            <span>Route Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="<%=(subUri==='list')?'nav-active':''%>">
                                <a href="{{ route('admin.route.store') }}"> Add Route </a>
                            </li>
                            <li class="<%=(subUri==='add')?'nav-active':''%>">
                                <a href="{{ route('admin.route.list') }}"> View Route </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent <%=(mainUri==='bus-stop')?'nav-expanded':''%>">
                        <a href="javascript:void(0)">
                            <i class="fa fa-file-image-o"></i>
                            <span>Bus Stop Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="<%=(subUri==='list')?'nav-active':''%>">
                                <a href="{{ route('admin.bus.stop.store') }}"> Add Bus Stop </a>
                            </li>
                            <li class="<%=(subUri==='add')?'nav-active':''%>">
                                <a href="{{ route('admin.bus.stop.list') }}"> View Bus Stop </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent <%=(mainUri==='bus')?'nav-expanded':''%>">
                        <a href="javascript:void(0)">
                            <i class="fa fa-file-image-o"></i>
                            <span>Bus Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="<%=(subUri==='list')?'nav-active':''%>">
                                <a href="{{ route('admin.bus.store') }}"> Add Bus </a>
                            </li>
                            <li class="<%=(subUri==='add')?'nav-active':''%>">
                                <a href="{{ route('admin.bus.store') }}"> View Bus </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent <%=(mainUri==='job')?'nav-expanded':''%>">
                        <a href="javascript:void(0)">
                            <i class="fa fa-file-image-o"></i>
                            <span>Job Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="<%=(subUri==='list')?'nav-active':''%>">
                                <a href="{{ route('admin.job.store') }}">Add Job</a>
                            </li>
                            <li class="<%=(subUri==='add')?'nav-active':''%>">
                                <a href="{{ route('admin.job.list') }}">View Job</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent <%=(mainUri==='user')?'nav-expanded':''%>">
                        <a href="javascript:void(0)">
                            <i class="fa fa-file-image-o"></i>
                            <span>User Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="<%=(subUri==='list')?'nav-active':''%>">
                                <a href="{{ route('admin.user.customer.list') }}">User List</a>
                            </li>
                            <li class="<%=(subUri==='add')?'nav-active':''%>">
                                <a href="#">Subscripton</a>
                            </li>
                        </ul>
                    </li>

                    <li class="<%=(mainUri==='notification')?'nav-active':''%>">
                        <a href="{{ route('admin.user.notification') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Notification</span>
                        </a>
                    </li>

                    <li class="<%=(mainUri==='feedback')?'nav-active':''%>">
                        <a href="{{ route('admin.user.feedback.list') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Feedback</span>
                        </a>
                    </li>

                    <li class="nav-parent <%=(mainUri==='settings')?'nav-expanded':''%>">
                        <a href="javascript:void(0)">
                            <i class="fa fa-file-image-o"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="<%=(subUri==='list')?'nav-active':''%>">
                                <a href="{{ route('admin.user.help.support') }}"> Help & Support </a>
                            </li>
                            <li class="<%=(subUri==='add')?'nav-active':''%>">
                                <a href="{{ route('admin.user.privacy.policy') }}"> Privacy Policy </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <hr class="separator" />
        </div>
    </div>
</aside>
<!-- end: sidebar -->

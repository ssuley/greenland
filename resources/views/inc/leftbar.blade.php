<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="{{route('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        @if(auth()->user()->hasrole('admin|General Manager'))
                          <li>
                            <a href="#"><i class="fa fa-users"></i> User Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('new-account') }}"><i class="fa fa-plus"></i> Create User</a>
                                </li>
                                <li>
                                    <a href="{{ route('account') }}"><i class="fa fa-list"></i> List User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        @if(!auth()->user()->hasrole('admin'))
                        <li>
                            <a href="#"><i class="fa fa-book"></i> Al-Amin Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('new-al-amin-invoice') }}"><i class="fa fa-plus"></i> Create Invoice</a>
                                </li>
                                <li>
                                    <a href="{{ route('al-amin-invoices') }}"><i class="fa fa-list"></i> List Invoice</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book"></i> Bakari Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('new-bakari-invoice') }}"><i class="fa fa-plus"></i> Create Invoice</a>
                                </li>
                                <li>
                                    <a href="{{ route('bakari-invoices') }}"><i class="fa fa-list"></i> List Invoice</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book"></i> GreenLand Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('new-greenland-invoice') }}"><i class="fa fa-plus"></i> Create Invoice</a>
                                </li>
                                <li>
                                    <a href="{{ route('greenland-invoices') }}"><i class="fa fa-list"></i> List Invoice</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book"></i> Masuo Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('new-masuo-invoice') }}"><i class="fa fa-plus"></i> Create Invoice</a>
                                </li>
                                <li>
                                    <a href="{{ route('masuo-invoices') }}"><i class="fa fa-list"></i> List Invoice</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book"></i> Meridian Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('new-meridian-invoice') }}"><i class="fa fa-plus"></i> Create Invoice</a>
                                </li>
                                <li>
                                    <a href="{{ route('meridian-invoices') }}"><i class="fa fa-list"></i> List Invoice</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Main Menu</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('admin.dashboard') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>

             <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="icofont icofont-calculator-alt-2"></i></span>
                    <span class="pcoded-mtext">Report Estimation</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('admin.custom_report') }}">
                            <span class="pcoded-mtext">Custom Report</span>
                        </a>
                    </li>

                     <li class=" ">
                        <a href="{{ route('admin.weekly_report') }}">
                            <span class="pcoded-mtext">Weekly Report</span>
                        </a>
                    </li>

                     <li class=" ">
                        <a href="{{ route('admin.monthly_report') }}">
                            <span class="pcoded-mtext">Monthly Report</span>
                        </a>
                    </li>

                     <li class=" ">
                        <a href="{{ route('admin.daily_report') }}">
                            <span class="pcoded-mtext">Daily Report</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="{{ route('admin.enroll_patient')}}">
                    <span class="pcoded-micon"><i class="icofont icofont-ui-add"></i></span>
                    <span class="pcoded-mtext">Enroll Patient</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.report_list')}}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Report List</span>
                </a>
            </li>

             <li class="">
                <a href="{{ route('refund_report_list') }}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Refund Report</span>
                </a>
            </li>
            
            <li class="">
                <a href="{{ route('package.index')}}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Packages</span>
                </a>
            </li>

             <li class="">
                <a href="{{ route('agency.list')}}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Agency</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('country.index')}}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Country</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('test.index')}}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Tests</span>
                </a>
            </li>


           

            <li class="">
                <a href="{{ route('service.index')}}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Service</span>
                </a>
            </li>
             <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="icofont icofont-ui-settings"></i></span>
                    <span class="pcoded-mtext">Setting</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('social_list') }}">
                            <span class="pcoded-mtext">Social page</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="{{ route('admin.contact_list') }}">
                            <span class="pcoded-mtext">Contact</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="">
                <a href="{{ route('slider.index')}}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Slider</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
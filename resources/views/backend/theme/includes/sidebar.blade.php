<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start {{ active_route('admin.index') }}">
                <a href="{{ aurl('/') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{ trans('main.dashboard') }}</span>
                </a>
            </li>

            <li class="heading">
                <h3 class="uppercase">{{ trans('main.users') }}</h3>
            </li>

            <li class="nav-item  {{ active_route('users.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">{{ trans('main.users') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('users.create') }}">
                        <a href="{{ route('users.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.user') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('users.index') }}">
                        <a href="{{ route('users.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.users') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  {{ active_route('roles.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-get-pocket"></i>
                    <span class="title">{{ trans('main.roles') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('roles.create') }}">
                        <a href="{{ route('roles.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.role') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('roles.index') }}">
                        <a href="{{ route('roles.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.roles') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  {{ active_route('permissions.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-tripadvisor"></i>
                    <span class="title">{{ trans('main.permissions') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('permissions.create') }}">
                        <a href="{{ route('permissions.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.permissions') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('permissions.index') }}">
                        <a href="{{ route('permissions.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.permissions') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

             <!-- Add statistics  (Mario Added) -->
             <li class="heading">
                 <h3 class="uppercase">{{ trans('main.statistics') }}</h3>
             </li>

             <li class="nav-item  {{ active_route('statistics.*') }}">
                 <a href="javascript:;" class="nav-link nav-toggle">
                     <i class="icon-users"></i>
                     <span class="title">{{ trans('main.statistics') }}</span>
                     <span class="arrow"></span>
                 </a>
                 <ul class="sub-menu">
                     <li class="nav-item {{ active_route('statistics.create') }}">
                         <a href="{{ route('statistics.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.statis') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('statistics.index') }}">
                         <a href="{{ route('statistics.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.statistics') }}</span>
                         </a>
                     </li>
                 </ul>
             </li>


             <!-- Add Student  (Add by Mario) -->
             <li class="heading">
                 <h3 class="uppercase">{{ trans('main.students') }}</h3>
             </li>

             <li class="nav-item  {{ active_route('students.*') }}">
                 <a href="javascript:;" class="nav-link nav-toggle">
                     <i class="icon-users"></i>
                     <span class="title">{{ trans('main.students') }}</span>
                     <span class="arrow"></span>
                 </a>
                 <ul class="sub-menu">
                     <li class="nav-item {{ active_route('students.create') }}">
                         <a href="{{ route('students.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.student') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('students.index') }}">
                         <a href="{{ route('students.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.students') }}</span>
                         </a>
                     </li>

                 </ul>
             </li>






             <!-- Add Class  (Mario Added) -->
             <li class="heading">
                 <h3 class="uppercase">{{ trans('main.classes') }}</h3>
             </li>

             <li class="nav-item  {{ active_route('classes.*') }}">
                 <a href="javascript:;" class="nav-link nav-toggle">
                     <i class="icon-users"></i>
                     <span class="title">{{ trans('main.classes') }}</span>
                     <span class="arrow"></span>
                 </a>
                 <ul class="sub-menu">
                     <li class="nav-item {{ active_route('classes.create') }}">
                         <a href="{{ route('classes.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.class') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('classes.index') }}">
                         <a href="{{ route('classes.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.classes') }}</span>
                         </a>
                     </li>
                 </ul>
             </li>

             <!-- Add Course  (Mario Added) -->
             <li class="heading">
                 <h3 class="uppercase">{{ trans('main.weeks_reports') }}</h3>
             </li>

             <li class="nav-item  {{ active_route('weeks.*') }}">
                 <a href="javascript:;" class="nav-link nav-toggle">
                     <i class="icon-users"></i>
                     <span class="title">{{ trans('main.weeks_reports') }}</span>
                     <span class="arrow"></span>
                 </a>
                 <ul class="sub-menu">
                     <li class="nav-item {{ active_route('weeks.create') }}">
                         <a href="{{ route('weeks.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.week_report') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('weeks.index') }}">
                         <a href="{{ route('weeks.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.weeks_reports') }}</span>
                         </a>
                     </li>
                     <!-- Add Courses_details -->
                     <li class="nav-item {{ active_route('weeks_details.create') }}">
                         <a href="{{ route('weeks_details.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.weeks_reports_details') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('weeks_details.index') }}">
                         <a href="{{ route('weeks_details.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.weeks_reports_details') }}</span>
                         </a>
                     </li>

                 </ul>
             </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>

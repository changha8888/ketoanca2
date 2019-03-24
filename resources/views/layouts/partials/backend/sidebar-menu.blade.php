<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- <li class="{{ \App\Utils::checkRoute(['dashboard::index', 'admin::index']) ? 'active': '' }}">
        <a href="{{ route('dashboard::index') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li> -->
    <li class="">
        <a href="{!! url('cks-admin/category/list') !!}">
            <i class="fa fa-user-secret"></i> <span>Dashboard</span>
        </a>
    </li>
    @if (Auth::user()->can('viewList', \App\User::class))
        <li class="{{ \App\Utils::checkRoute(['admin::users.index', 'admin::users.create']) ? 'active': '' }}">
            <a href="{{ route('admin::users.index') }}">
                <i class="fa fa-user-secret"></i> <span>Users</span>
            </a>
        </li>
    @endif
    <li class="">
        <a href="{!! url('cks-admin/category/list') !!}">
            <i class="fa fa-user-secret"></i> <span>Danh mục</span>
        </a>
    </li>
    <li class="">
        <a href="{!! url('cks-admin/post/list') !!}">
            <i class="fa fa-user-secret"></i> <span>Bài viết</span>
        </a>
    </li>
</ul>

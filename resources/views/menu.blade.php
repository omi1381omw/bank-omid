<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">بانک امید</span>
  </a>

  <div class="sidebar">

    @auth
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}</a>
      </div>
    </div>
    @endauth

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @can('admin')
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>
              مدیریت کاربران
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/users/create" class="nav-link active">
                <i class="far fa-bell nav-icon"></i>
                <p>ایجاد کاربر</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/users" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>لیست کاربران</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-setting-alt"></i>
            <p>
              مدیریت نقش ها
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/roles/create" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>ایجاد نقش</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/roles" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>لیست نقش ها</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-setting-alt"></i>
            <p>
              مدیریت حساب ها
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/bank_accounts/create" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>ایجاد حساب</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/bank_accounts" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>لیست حساب</p>
              </a>
            </li>
          </ul>
        </li>
        @elsecan('customer')
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-setting-alt"></i>
            <p>
              مدیریت حساب ها
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <!-- <li class="nav-item">
              <a href="/bank_accounts/open" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>ایجاد حساب</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="/customer/bank_accounts" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>لیست حساب</p>
              </a>
            </li>
          </ul>
        </li>
        @endcan
        @guest
        <li class="nav-item has-treeview ">
          <a href="/bank_accounts/open" class="nav-link active">
            <i class="nav-icon fas fa-setting-alt"></i>
            <p>افتتاح حساب</p>
          </a>
        </li>
        @endguest
      </ul>
    </nav>

  </div>
</aside>
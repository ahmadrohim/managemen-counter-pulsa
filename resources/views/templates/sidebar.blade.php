<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ $active == 'dashboard' ? 'active' : ''  }}"><a href="/">  <i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="treeview {{ $active == 'data-pembeli' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Manajemen Pelanggan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/pembeli"><i class="fa fa-circle-o"></i>Data Pembeli</a></li>
           
          </ul>
        </li> 
  
        <li class="header">LABELS</li>

        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
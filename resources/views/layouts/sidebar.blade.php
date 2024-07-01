
<section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU UTAMA</li>
        
    <li class="{{ (request()->is('superadmin/beranda')) ? 'active' : '' }}"><a href="/superadmin/beranda"><i class="fa fa-home"></i> <span><i>Beranda</i></span></a></li>
    <li class="{{ request()->is('superadmin/profil/*') ? 'active' : '' }} treeview">
        <a href="#">
        <i class="fa fa-building"></i> <span>Profil</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li class="{{ request()->is('superadmin/profil/struktur') ? 'active' : '' }}"><a href="/superadmin/profil/struktur"><i class="fa fa-circle-o {{ request()->is('superadmin/profil/struktur') ? 'text-yellow' : '' }}"></i> Struktur Organisasi</a></li>
        <li class="{{ request()->is('superadmin/profil/renstra') ? 'active' : '' }}"><a href="/superadmin/profil/renstra"><i class="fa fa-circle-o {{ request()->is('superadmin/profil/renstra') ? 'text-yellow' : '' }}"></i> Renstra</a></li>
        <li class="{{ request()->is('superadmin/profil/tupoksi') ? 'active' : '' }}"><a href="/superadmin/profil/tupoksi"><i class="fa fa-circle-o {{ request()->is('superadmin/profil/tupoksi') ? 'text-yellow' : '' }}"></i> Tupoksi</a></li>

        </ul>
    </li>
    
    <li class="{{ (request()->is('superadmin/berita*')) ? 'active' : '' }}"><a href="/superadmin/berita"><i class="fa fa-newspaper-o"></i> <span>Berita</span></a></li>
    <li class="{{ (request()->is('superadmin/agenda*')) ? 'active' : '' }}"><a href="/superadmin/agenda"><i class="fa fa-edit"></i> <span>Agenda</span></a></li>
    <li class="{{ (request()->is('superadmin/pengumuman*')) ? 'active' : '' }}"><a href="/superadmin/pengumuman"><i class="fa fa-bullhorn"></i> <span>Pengumuman</span></a></li>
    <li class="{{ (request()->is('superadmin/forum*')) ? 'active' : '' }}"><a href="/superadmin/forum"><i class="fa fa-comments-o"></i> <span>Forum</span></a></li>
    <li class="header">SETTING</li>
    
    <li><a href="/logout"><i class="fa fa-sign-out"></i> <span><i>Logout</i></span></a></li>
   
    
    </ul>
    <!-- /.sidebar-menu -->
</section>
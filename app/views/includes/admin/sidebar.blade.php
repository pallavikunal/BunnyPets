<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            &nbsp;
        </div>
        
    </div>  
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">        
        <li  class="treeview @if(Session::get('parent_menu') == 'service') active  @endif">
            <a href="#">
                <i class="fa fa-file-text"></i>
                <span>Manage Service</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@if(Session::get('sub_menu') == 'listService') active  @endif">
                    <a href="{{ URL::route('service.index') }}" style="margin-left: 10px;">
                        <i class="fa fa-angle-double-right"></i>
                        <span>List Services</span>
                    </a>
                </li>
                <li class="@if(Session::get('sub_menu') == 'addService') active  @endif">
                    <a href="{{ URL::route('service.create') }}" style="margin-left: 10px;">
                        <i class="fa fa-angle-double-right"></i>
                        <span>Add Service</span>
                    </a>
                </li>
            </ul>            
        </li>
        
         <li  class="treeview @if(Session::get('parent_menu') == 'pet') active  @endif">
            <a href="#">
                <i class="fa fa-file-text"></i>
                <span>Manage Pet</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@if(Session::get('sub_menu') == 'listPets') active  @endif">
                    <a href="{{ URL::route('pet.index') }}" style="margin-left: 10px;">
                        <i class="fa fa-angle-double-right"></i>
                        <span>List Pets</span>
                    </a>
                </li>
                <li class="@if(Session::get('sub_menu') == 'addService') active  @endif">
                    <a href="{{ URL::route('pet.create') }}" style="margin-left: 10px;">
                        <i class="fa fa-angle-double-right"></i>
                        <span>Add Pet</span>
                    </a>
                </li>
            </ul>            
        </li>  
    </ul>
</section>
<!-- /.sidebar -->

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a @if(Session::get("page")=="dashboard") style="background: hsl(353deg 100% 78%) !important; color:#fff !important" @endif class="nav-link" href="{{ url('admin/dashboard')}}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if(Auth::guard('admin')->user()->type=="vendor")
        <li class="nav-item">
            <a @if(Session::get("page")=="update_personal_details" || Session::get('page')=="update_business_details" || Session::get('page')=="update_bank_details")
            style="background:hsl(353deg 100% 78%)!important; color:#fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-vendors" aria-expanded="false" aria-controls="ui-vendors">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Vendor Details</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-vendors">
                <ul class="nav flex-column sub-menu" >
                    <li class="nav-item"> <a @if(Session::get("page")=="update_personal_details") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;" @endif class="nav-link" href="{{ url('admin/update-vendor-details/personal') }}">Personal Details</a></li>
                    <li class="nav-item"> <a  @if(Session::get("page")=="update_business_details") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;" @endif class="nav-link" href="{{ url('admin/update-vendor-details/business') }}">Business Details</a></li>
                    <li class="nav-item"> <a  @if(Session::get("page")=="update_bank_details") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;" @endif class="nav-link" href="{{ url('admin/update-vendor-details/bank') }}">Bank Details</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a @if(Session::get("page")=="sections" || Session::get("page")=="categories" || Session::get("page")=="brands" || Session::get("page")=="products") || Session::get("page")=="coupons")  || Session::get("page")=="filters") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Catalogue Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-catalogue">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a @if(Session::get('page')=="products") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/products') }}">Products</a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="coupons") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/coupons') }}">Coupons</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a @if(Session::get("page")=="orders") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Order Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-orders">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a @if(Session::get('page')=="orders") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/orders') }}">Orders</a></li>
                </ul>
            </div>
        </li>
        @else
        <li class="nav-item">
            <a @if(Session::get("page")=="update_admin_password" || Session::get('page')=="update_admin_details") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-settings">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Settings</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-settings">
                <ul class="nav flex-column sub-menu" >
                    <li class="nav-item"> <a @if(Session::get("page")=="update_admin_password") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color: hsl(353deg 100% 78%) !important;" @endif class="nav-link" href="{{ url('admin/update-admin-password') }}">Update Password</a></li>
                    <li class="nav-item"> <a  @if(Session::get("page")=="update_admin_details") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color: hsl(353deg 100% 78%) !important;" @endif class="nav-link" href="{{ url('admin/update-admin-details') }}">Update Details</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a @if(Session::get("page")=="view_admins" || Session::get('page')=="view_subadmins" || Session::get('page')=="view_vendors" || Session::get('page')=="view_all") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-admins" aria-expanded="false" aria-controls="ui-admins">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Admin Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-admins">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a @if(Session::get('page')=="view_admins") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;" @endif class="nav-link" href="{{ url('admin/admins/admin') }}">Admins</a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="view_subadmins") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;" @endif class="nav-link" href="{{ url('admin/admins/subadmin') }}">Sub Admins</a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="view_vendors") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;" @endif class="nav-link" href="{{ url('admin/admins/vendor') }}">Vendors</a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="view_all") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;" @endif class="nav-link" href="{{ url('admin/admins') }}">All</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a @if(Session::get("page")=="sections" || Session::get("page")=="categories" || Session::get("page")=="brands" || Session::get("page")=="products") || Session::get("page")=="filters") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Catalogue Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-catalogue">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a @if(Session::get('page')=="sections") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/sections') }}">Sections</a></li>
                    <li class="nav-item"> <a   @if(Session::get('page')=="categories") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/categories') }}">Categories</a></li>
                    <li class="nav-item"> <a   @if(Session::get('page')=="brands") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/brands') }}">Brands</a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="products") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/products') }}">Products</a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="coupons") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/coupons') }}">Coupons</a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="filters") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/filters') }}">Filters</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a @if(Session::get("page")=="orders") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Order Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-orders">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a @if(Session::get('page')=="orders") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/orders') }}">Orders</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a @if(Session::get("page")=="users" || Session::get("page")=="subscribers" ) style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-users">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">User Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a @if(Session::get('page')=="users") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/users') }}">Users</a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="subscribers") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/subscribers') }}">Subscribers</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a @if(Session::get("page")=="banners") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-banners" aria-expanded="false" aria-controls="ui-banners">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Banner Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-banners">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a @if(Session::get('page')=="banners") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/banners') }}">Home Page Banners</a></li> 
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a @if(Session::get("page")=="ratings") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-ratings" aria-expanded="false" aria-controls="ui-ratings">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Ratings & Reviews</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-ratings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a @if(Session::get('page')=="ratings") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/ratings') }}">Ratings</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
                    
        <a @if(Session::get("page")=="shipping") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-shipping" aria-expanded="false" aria-controls="ui-shipping">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Shipping Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-shipping">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a @if(Session::get('page')=="shipping") style="background: hsl(353deg 100% 78%) !important; color:#fff !important;" @else style="background: #fff !important; color:hsl(353deg 100% 78%) !important;"  @endif class="nav-link" href="{{ url('admin/shipping-charges') }}">Shipping Charges</a></li> 
                </ul>
            </div>
        </li>
        @endif
        <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
            <i class="icon-columns menu-icon"></i>
            <span class="menu-title">Form elements</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
            <i class="icon-bar-graph menu-icon"></i>
            <span class="menu-title">Charts</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">Tables</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
            <i class="icon-contract menu-icon"></i>
            <span class="menu-title">Icons</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="icon-head menu-icon"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
            <i class="icon-ban menu-icon"></i>
            <span class="menu-title">Error pages</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
            <i class="icon-paper menu-icon"></i>
            <span class="menu-title">Documentation</span>
            </a>
        </li> -->
</nav>
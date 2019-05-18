
        <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{ ('admin/links/images/users/avatar-1.jpg') }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">John Doe <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('/') }}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-view-list"></i><strong style="color:green;"> POS </strong><span class="pull-right"><i class="md md-view-list"></i></span></a>
                                <ul>
                                    <li class="{{ Request::routeIs('pos') ? 'active' : '' }}"><a href="{{ route('pos') }}"> Add Pos</a></li>
                                    <li class="{{ Request::routeIs('pos.ajax') ? 'active' : '' }}"><a href="{{ route('pos.ajax') }}">Add Pos With Ajax</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-view-list"></i><span> Order </span><span class="pull-right"><i class="md md-view-list"></i></span></a>
                                <ul>
                                    <li class="active"><a href="{{ route('pending.order') }}"> Pending Order</a></li>
                                    <li class="active"><a href="{{ route('order.success') }}">Success Order</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-view-list"></i><span> Product </span><span class="pull-right"><i class="md md-view-list"></i></span></a>
                                <ul>
                                    <li class="active"><a href="{{ route('product') }}"> Add Product</a></li>
                                    <li class="active"><a href="{{ route('product.show') }}">All Product</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-view-list"></i><span> Category </span><span class="pull-right"><i class="md md-view-list"></i></span></a>
                                <ul>
                                    <li class="active"><a href="{{ route('category') }}"> Add Category</a></li>
                                    <li class="active"><a href="{{ route('category.show') }}">All Category</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i><span> Employee </span><span class="pull-right"><i class="fa fa-user"></i></span></a>
                                <ul>
                                    <li class="active"><a href="{{ route('employee') }}"> Add Employee</a></li>
                                    <li class="active"><a href="{{ route('employee.show') }}">All Employee</a></li>
                                </ul>
                            </li>
    
                          
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i> <span> Customer </span> <span class="pull-right"><i class="fa fa-user"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('customer') }}">Add Customer</a></li>
                                    <li><a href="{{ route('customer.show') }}">All Customer</a></li>
                                    
                                </ul>
                            </li>
    
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i> <span> Supplier </span> <span class="pull-right"><i class="fa fa-user"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('supplier') }}">Add Supplier</a></li>
                                    <li><a href="{{ route('supplier.show') }}">All Supplier</a></li>
                                    <li><a href="{{ route('suppliertype') }}">Add Supplier Type</a></li> 
                                    <li><a href="{{ route('suppliertype.show') }}">All Supplier Type</a></li> 
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-view-list"></i> <span> Warehouse </span> <span class="pull-right"><i class="md md-view-list"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('warehouse') }}">Add Warehouse</a></li>
                                    <li><a href="{{ route('warehouse.show') }}">All Warehouse</a></li>
                                    <li><a href="{{ route('warehouse_section') }}">Add Warehouse Section</a></li> 
                                    <li><a href="{{ route('warehouse_section.show') }}">All Warehouse Section</a></li> 
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-view-list"></i><strong style="color:green;"> Bangladesh </strong><span class="pull-right"><i class="md md-view-list"></i></span></a>
                                <ul>
                                    <li class="active"><a href="{{ route('bangladesh') }}">Bangladesh</a></li>
                                    <li class="active"><a href="#">All Pos</a></li>
                                </ul>
                            </li>

                            <!--
                            <li>
                                <a href="calendar.html" class="waves-effect"><i class="md md-event"></i><span> Calendar </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span> Components </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="grid.html">Grid</a></li>
                                    <li><a href="portlets.html">Portlets</a></li>
                                    <li><a href="widgets.html">Widgets</a></li>
                                    <li><a href="nestable-list.html">Nesteble</a></li>
                                    <li><a href="ui-sliders.html">Sliders </a></li>
                                    <li><a href="gallery.html">Gallery </a></li>
                                    <li><a href="pricing.html">Pricing Table </a></li>
                                </ul>
                            </li>
    
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-redeem"></i> <span> Icons </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="material-icon.html">Material Design</a></li>
                                    <li><a href="ion-icons.html">Ion Icons</a></li>
                                    <li><a href="font-awesome.html">Font awesome</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-now-widgets"></i><span> Forms </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="form-elements.html">General Elements</a></li>
                                    <li><a href="form-validation.html">Form Validation</a></li>
                                    <li><a href="form-advanced.html">Advanced Form</a></li>
                                    <li><a href="form-wizard.html">Form Wizard</a></li>
                                    <li><a href="form-editor.html">WYSIWYG Editor</a></li>
                                    <li><a href="code-editor.html">Code Editors</a></li>
                                    <li><a href="form-uploads.html">Multiple File Upload</a></li>
                                    <li><a href="form-xeditable.html">X-editable</a></li>
                                </ul>
                            </li>
    
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-view-list"></i><span> Data Tables </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="tables.html">Basic Tables</a></li>
                                    <li><a href="table-datatable.html">Data Table</a></li>
                                    <li><a href="tables-editable.html">Editable Table</a></li>
                                    <li><a href="responsive-table.html">Responsive Table</a></li>
                                </ul>
                            </li>
    
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-poll"></i><span> Charts </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="morris-chart.html">Morris Chart</a></li>
                                    <li><a href="chartjs.html">Chartjs</a></li>
                                    <li><a href="flot-chart.html">Flot Chart</a></li>
                                    <li><a href="peity-chart.html">Peity Charts</a></li>
                                    <li><a href="charts-sparkline.html">Sparkline Charts</a></li>
                                    <li><a href="chart-radial.html">Radial charts</a></li>
                                    <li><a href="other-chart.html">Other Chart</a></li>
                                </ul>
                            </li>
    
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-place"></i><span> Maps </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="gmap.html"> Google Map</a></li>
                                    <li><a href="vector-map.html"> Vector Map</a></li>
                                </ul>
                            </li>
    
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-pages"></i><span> Pages </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="profile.html">Profile</a></li>
                                    <li><a href="timeline.html">Timeline</a></li>
                                    <li><a href="invoice.html">Invoice</a></li>
                                    <li><a href="email-template.html">Email template</a></li>
                                    <li><a href="contact.html">Contact-list</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="recoverpw.html">Recover Password</a></li>
                                    <li><a href="lock-screen.html">Lock Screen</a></li>
                                    <li><a href="blank.html">Blank Page</a></li>
                                    <li><a href="maintenance.html">Maintenance</a></li>
                                    <li><a href="coming-soon.html">Coming-soon</a></li>
                                    <li><a href="404.html">404 Error</a></li>
                                    <li><a href="404_alt.html">404 alt</a></li>
                                    <li><a href="500.html">500 Error</a></li>
                                </ul>
                            </li>
    
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="md md-share"></i><span>Multi Level </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul>
                                    <li class="has_sub">
                                        <a href="javascript:void(0);" class="waves-effect"><span>Menu Level 1.1</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                        <ul style="">
                                            <li><a href="javascript:void(0);"><span>Menu Level 2.1</span></a></li>
                                            <li><a href="javascript:void(0);"><span>Menu Level 2.2</span></a></li>
                                            <li><a href="javascript:void(0);"><span>Menu Level 2.3</span></a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><span>Menu Level 1.2</span></a>
                                    </li>
                                </ul>
                            </li>-->


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
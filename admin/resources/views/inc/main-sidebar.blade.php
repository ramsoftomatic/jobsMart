  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <i class="ion ion-person" style="color: white; font-size: 48px;"></i>
        </div>
        <div class="pull-left info">
          <h4>{{session('username')}}</h4>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form" style="display: none;">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        
        
        
          @if('dashboard'== Request::path())
            <li class="active ">
          @else
            <li class="">
          @endif
          <a href="dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
          <!-- <ul class="treeview-menu">
            <li class="active"><a href="/admin/public/"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="/admin/public/index2"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
        </li>
        
        @if('add_company'== Request::path() || 'view-company'== Request::path())
            <li class="active treeview">
          @else
            <li class="treeview">
          @endif         
         
        <a href="#">
            <i class="fa fa-edit text-pink "></i>
            <span>Company</span>
            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          @if('add_company'== Request::path())
                <li class="active ">
                @else
                <li class="">
          @endif
            <li><a href="add_company"><i class="fa fa-plus-circle text-red"></i>Add</a></li>
          @if('view_company'== Request::path())
                <li class="active ">
                @else
                <li class="">
          @endif
            <li><a href="companylist"><i class="fa fa-eye text-white"></i>View</a></li>
          </ul>
        </li>
        
       <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li> -->
        @if('add_staff'== Request::path())
        <li class="active treeview">
        @else
        <li class="treeview">
        @endif
          <a href="#">
            <i class="fa fa-file-text text-yellow"></i>
            <span>Staff</span>
            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

           <ul class="treeview-menu">
                    <li><a href="add_staff"><i class="fa fa-plus-circle text-red"></i>Add Staff</a></li>
                    <li><a href="staff_list"><i class="fa fa-eye text-white"></i>View</a></li>
          </ul>
         </li>



         @if('add-resume'== Request::path() || 'view-resume'== Request::path() || 'upload-csv'== Request::path() || 'upload-resume'== Request::path())
            <li class="active treeview">
          @else
            <li class="treeview">
          @endif
          
          <a href="#">
            <i class="fa fa-file-text text-yellow"></i>
            <span>Resume</span>
            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add-resume"><i class="fa fa-plus-circle text-red"></i>Add</a></li>
            <li><a href="view-resume"><i class="fa fa-eye text-white"></i>View</a></li>
            <li><a href="upload-csv"><i class="fa fa-file-o text-aqua"></i> <span>Upload .CSV file</span></a></li>
            <li><a href="upload-resume"><i class="fa fa-file-o text-white"></i> <span>Upload Resume file</span></a></li>
          </ul>
        </li>
      


        @if('search-candidate'== Request::path())
        <li class="active ">
        @else
        <li class="">
        @endif
          <a href="search-candidate"><i class="fa fa-search text-green"></i> <span>Search Candidate</span></a>
        </li>

        @if('create-job'== Request::path())
        <li class="active ">
        @else
        <li class="">
        @endif
          <a href="create-job"><i class="fa fa-plus-square text-yellow"></i> <span>Create Job</span></a>
        </li>

        @if('job-list'== Request::path())
        <li class="active ">
        @else
        <li class="">
        @endif
          <a href="job-list"><i class="fa fa-list text-red"></i> <span>Job List</span></a>
        </li>
        
        @if('candidatelist'== Request::path())
        <li class="active ">
        @else
        <li class="">
        @endif
          <a href="candidatelist"><i class="fa fa-list text-red"></i> <span>Candidate List</span></a>
        </li>

        @if('error-list'== Request::path())
        <li class="active ">
        @else
        <li class="">
        @endif
          <a href="error-list"><i class="fa fa-list text-aqua"></i> <span>Error List</span></a>
        </li>
        @if('add_user'== Request::path() || 'view_user'== Request::path() || 'assign_company'== Request::path())
            <li class="active treeview">
          @else
            <li class="treeview">
          @endif  
         
        <a href="#">
            <i class="fa fa-edit text-aqua"></i>
            <span>Users</span>
            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              @if('add_user'== Request::path())
                <li class="active ">
                @else
                <li class="">
                @endif
                <a href="add_user"><i class="fa fa-plus-circle text-red"></i>Add</a>
              </li>
      
 <!--@if('assign_company'== Request::path())-->
 <!--               <li class="active ">-->
 <!--               @else-->
 <!--               <li class="">-->
 <!--               @endif-->
 <!--             <a href="assign_company"><i class="fa fa-edit text-green"></i> <span>Assign Company</span></a>-->
 <!--           </li>-->
          </ul>
        </li>
        @if('candidate_applied'== Request::path())
        <li class="active ">
        @else
        <li class="">
        @endif
          <a href="candidate_applied"><i class="fa fa-user text-green"></i> <span>Candidate Applied</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
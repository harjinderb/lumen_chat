 <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('assets/img/sidebar-1.jpg') }}">
      <!--Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag-->
      @php
        $prifix = \Request::route()->getPrefix();
      @endphp
      <div class="logo">
        <a href="{{ URL::to($prifix.'/dashboard')}}" class="simple-text logo-normal">
          Chat Server
        </a>
      </div>
      <div class="sidebar-wrapper">
        @if($prifix == '/admin')
        <ul class="nav">
          <li class="nav-item {{ (\Request::route()->getName() == 'dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ URL::to('admin/dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ (\Request::route()->getName() == 'profile') ? 'active' : '' }}">
            <a class="nav-link" href="{{URL :: to('/admin/profile') }}">
              <i class="material-icons">portrait</i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item {{ (\Request::route()->getName() == 'features') ? 'active' : '' }}">
            <a class="nav-link" href="{{URL :: to('/admin/manage-features') }}">
              <i class="fa fa-gears"></i>
              <p>Manage Features</p>
            </a>
          </li>
          <li class="nav-item  {{ (\Request::route()->getName() == 'plans') ? 'active' : '' }}">
               <a class="nav-link collapsed" data-toggle="collapse" href="#componentsExamples" aria-expanded="false">
                    <i class="material-icons">list_alt</i>
                    <p> Subscription Plans
                       <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="componentsExamples" style="">
                    <ul class="nav">
                      <li class="nav-item {{ (collect(request()->segments())->last() == 'add') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="{{URL :: to('/admin/plans/add') }}">
                          <i class="material-icons">note_add</i>
                          <p>Add Plans</p>
                        </a>
                      </li>
                      <li class="nav-item {{ (collect(request()->segments())->last() == 'list') ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="{{URL :: to('/admin/plans/list') }}">
                          <i class="fa fa-gears"></i>
                          <p>Manage Plans</p>
                        </a>
                      </li>

                    </ul>
                </div>
            </li>
             <li class="nav-item {{ (\Request::route()->getName() == 'manage_owners') ? 'active' : '' }}">
            <a class="nav-link" href="{{URL :: to('/admin/manage-users') }}">
              <i class="fa fa-users"></i>
              <p>Manage Users</p>
            </a>
          </li>

           <!-- <li class="nav-item ">
               <a class="nav-link collapsed" data-toggle="collapse" href="#componentsExamples" aria-expanded="false">
                    <i class="material-icons">apps</i>
                    <p> Components
                       <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="componentsExamples" style="">
                    <ul class="nav">
                      <li class="nav-item ">
                          <a class="nav-link collapsed" data-toggle="collapse" href="#componentsCollapse" aria-expanded="false">
                            <span class="sidebar-mini"> MLT </span>
                            <span class="sidebar-normal"> Multi Level Collapse
                              <b class="caret"></b>
                            </span>

                          </a>

                          <div class="collapse" id="componentsCollapse" style="">
                              <ul class="nav">
                                  <li class="nav-item ">
                                      <a class="nav-link" href="#0">
                                        <span class="sidebar-mini"> E </span>
                                        <span class="sidebar-normal"> Example </span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>

                    </ul>
                </div>
            </li> -->
        </ul>
        @endif
         @if($prifix == '/owner')
        <ul class="nav">
          <li class="nav-item {{ (\Request::route()->getName() == 'dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ URL::to('owner/dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ (\Request::route()->getName() == 'profile') ? 'active' : '' }}">
            <a class="nav-link" href="{{URL :: to('/owner/profile') }}">
              <i class="material-icons">portrait</i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item {{ (\Request::route()->getName() == 'companies') ? 'active' : '' }}">
            <a class="nav-link" href="{{URL :: to('/owner/companies') }}">
              <i class="material-icons">business</i>
              <p>Companies</p>
            </a>
          </li>
        </ul>
        @endif
      </div>
    </div>
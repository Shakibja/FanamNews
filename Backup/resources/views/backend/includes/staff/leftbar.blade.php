<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{asset('backend')}}/assets/images/faces/face1.jpg" alt="profile" />
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">
                  @if(!empty($admin))
                      {{ $admin->name }}
                  @elseif(!empty($user))
                      {{ $user->name }}
                  @endif
                  </span>
                  <!-- <span class="text-secondary text-small">Project Manager</span> -->
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="@if(Auth::guard('admin')->check()){{ route('admin.dashboard') }}@else{{ route('staff.dashboard') }}@endif">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">News</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-newspaper menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.manage_news_page')}}">View All News</a>
                  </li>
                </ul>
              </div>
            </li>


            <li class="nav-item">
            <a class="nav-link" href="{{ route('staff.advertise_page')}}">
                <span class="menu-title">Advertise</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>

          </ul>
        </nav>
<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
								    @if(\Auth::guard('admin')->user()->name == 'admin')
									    @include('admin.layouts.actions')
									@endif
									@if(\Auth::guard('admin')->user()->name == 'Role')
									    @include('admin.layouts.roleActions')
									@endif
								</ul>
							</nav>	
								</div>
							</div>
				</aside>
										
								
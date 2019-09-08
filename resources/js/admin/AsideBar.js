import React from 'react';

const AsideBar = () => {
  return (
	<>
	<aside className="control-sidebar control-sidebar-dark">
	  {/* Create the tabs */}
	  <ul className="nav nav-tabs nav-justified control-sidebar-tabs">
		<li className="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i className="fa fa-home"></i></a></li>
		<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i className="fa fa-gears"></i></a></li>
	  </ul>
	  {/* Tab panes */}
	  <div className="tab-content">
		{/* Home tab content */}
		<div className="tab-pane active" id="control-sidebar-home-tab">
		  <h3 className="control-sidebar-heading">Recent Activity</h3>
		  <ul className="control-sidebar-menu">
			<li>
			  <a href="javascript:;">
				<i className="menu-icon fa fa-birthday-cake bg-red"></i>

				<div className="menu-info">
				  <h4 className="control-sidebar-subheading">Langdon's Birthday</h4>

				  <p>Will be 23 on April 24th</p>
				</div>
			  </a>
			</li>
		  </ul>
		  {/* /.control-sidebar-menu */}

		  <h3 className="control-sidebar-heading">Tasks Progress</h3>
		  <ul className="control-sidebar-menu">
			<li>
			  <a href="javascript:;">
				<h4 className="control-sidebar-subheading">
				  Custom Template Design
				  <span className="pull-right-container">
					  <span className="label label-danger pull-right">70%</span>
					</span>
				</h4>

				<div className="progress progress-xxs">
				  <div className="progress-bar progress-bar-danger" style={{ width: '70%'}}></div>
				</div>
			  </a>
			</li>
		  </ul>
		  {/* /.control-sidebar-menu */}

		</div>
		{/* /.tab-pane */}
		{/* Stats tab content */}
		<div className="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
		{/* /.tab-pane */}
		{/* Settings tab content */}
		<div className="tab-pane" id="control-sidebar-settings-tab">
		  <form method="post">
			<h3 className="control-sidebar-heading">General Settings</h3>

			<div className="form-group">
			  <label className="control-sidebar-subheading">
				Report panel usage
				<input type="checkbox" className="pull-right" checked />
			  </label>

			  <p>
				Some information about this general settings option
			  </p>
			</div>
			{/* /.form-group */}
		  </form>
		</div>
		{/* /.tab-pane */}
	  </div>
	</aside>

	{/* Add the sidebar's background. This div must be placed
	// immediately after the control sidebar */}
	<div className="control-sidebar-bg"></div>
  </>
  );
}

export default AsideBar;

import React from 'react';

const Nav = () => {
  
  return (
	<header className="main-header">
	  {/* logo */}
	  <a href="/admin" className="logo">
		{/* mini logo for sidebar mini 50x50 pixels */}
		<span className="logo-mini"><b>BC</b></span>
		{/* logo for regular state and mobile devices */}
		<span className="logo-lg"><b>Bent</b> Comics</span>
	  </a>

	  {/* Header Navbar  */}
	  <nav className="navbar navbar-static-top" role="navigation">
		{/* Sidebar toggle button */}
		<a href="#" className="sidebar-toggle" data-toggle="push-menu" role="button">
		  <span className="sr-only">Toggle navigation</span>
		</a>

		<NavRightMenu />

	  </nav>
	</header>
  );
}

const NavRightMenu = () => {
  return (
	<div className="navbar-custom-menu">
	  <ul className="nav navbar-nav">
		{/* Messages: style can be found in dropdown.less */}
		<li className="dropdown messages-menu">
		  {/* Menu toggle button  */}
		  <a href="#" className="dropdown-toggle" data-toggle="dropdown">
			<i className="fa fa-envelope-o"></i>
			<span className="label label-success">4</span>
		  </a>
		  <ul className="dropdown-menu">
			<li className="header">You have 4 messages</li>
			<li>
			  {/* inner menu: contains the messages  */}
			  <ul className="menu">
				<li>{/* start message  */}
				  <a href="#">
					<div className="pull-left">
					  {/* User Image  */}
					  <img src="img/user2-160x160.jpg" className="img-circle" alt="User Image" />
					</div>
					{/* Message title and timestamp  */}
					<h4>
					  Support Team
					  <small><i className="fa fa-clock-o"></i> 5 mins</small>
					</h4>
					{/* The message  */}
					<p>Why not buy a new awesome theme?</p>
				  </a>
				</li>
				{/* end message  */}
			  </ul>
			  {/* /.menu  */}
			</li>
			<li className="footer"><a href="#">See All Messages</a></li>
		  </ul>
		</li>
		{/* /.messages-menu  */}

		{/* Notifications Menu  */}
		<li className="dropdown notifications-menu">
		  {/* Menu toggle button  */}
		  <a href="#" className="dropdown-toggle" data-toggle="dropdown">
			<i className="fa fa-bell-o"></i>
			<span className="label label-warning">10</span>
		  </a>
		  <ul className="dropdown-menu">
			<li className="header">You have 10 notifications</li>
			<li>
			  {/* Inner Menu: contains the notifications  */}
			  <ul className="menu">
				<li>{/* start notification  */}
				  <a href="#">
					<i className="fa fa-users text-aqua"></i> 5 new members joined today
				  </a>
				</li>
				{/* end notification  */}
			  </ul>
			</li>
			<li className="footer"><a href="#">View all</a></li>
		  </ul>
		</li>
		{/* Tasks Menu  */}
		<li className="dropdown tasks-menu">
		  {/* Menu Toggle Button  */}
		  <a href="#" className="dropdown-toggle" data-toggle="dropdown">
			<i className="fa fa-flag-o"></i>
			<span className="label label-danger">9</span>
		  </a>
		  <ul className="dropdown-menu">
			<li className="header">You have 9 tasks</li>
			<li>
			  {/* Inner menu: contains the tasks  */}
			  <ul className="menu">
				<li>{/* Task item  */}
				  <a href="#">
					{/* Task title and progress text  */}
					<h3>
					  Design some buttons
					  <small className="pull-right">20%</small>
					</h3>
					{/* The progress bar  */}
					<div className="progress xs">
					  {/* Change the css width attribute to simulate progress  */}
					  <div className="progress-bar progress-bar-aqua" style={{ width: '20%' }} role="progressbar"
						   aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
						<span className="sr-only">20% Complete</span>
					  </div>
					</div>
				  </a>
				</li>
				{/* end task item  */}
			  </ul>
			</li>
			<li className="footer">
			  <a href="#">View all tasks</a>
			</li>
		  </ul>
		</li>
		{/* User Account Menu  */}
		<li className="dropdown user user-menu">
		  {/* Menu Toggle Button  */}
		  <a href="#" className="dropdown-toggle" data-toggle="dropdown">
			{/* The user image in the navbar */}
			<img src="img/user2-160x160.jpg" className="user-image" alt="User Image" />
			{/* hidden-xs hides the username on small devices so only the image appears.  */}
			<span className="hidden-xs">{ 'name' }</span>
		  </a>
		  <ul className="dropdown-menu">
			{/* The user image in the menu  */}
			<li className="user-header">
			  <img src="img/user2-160x160.jpg" className="img-circle" alt="User Image" />

			  <p>
				{ 'name' }
				<small>{ 'username' }</small>
			  </p>
			</li>
			{/* Menu Body  */}
			<li className="user-body">
			  <div className="row">
				<div className="col-xs-4 text-center">
				  <a href="#">Followers</a>
				</div>
				<div className="col-xs-4 text-center">
				  <a href="#">Sales</a>
				</div>
				<div className="col-xs-4 text-center">
				  <a href="#">Friends</a>
				</div>
			  </div>
			  {/* /.row  */}
			</li>
			{/* Menu Footer */}
			<li className="user-footer">
			  <div className="pull-left">
				<a href="#" className="btn btn-default btn-flat">Profile</a>
			  </div>
			  <div className="pull-right">
				<a href="{{ route('logout') }}" className="btn btn-default btn-flat">Sign out</a>
			  </div>
			</li>
		  </ul>
		</li>
		{/* Control Sidebar Toggle Button  */}
		<li>
		  <a href="#" data-toggle="control-sidebar"><i className="fa fa-gears"></i></a>
		</li>
	  </ul>
	</div>
  );
}

export default Nav;

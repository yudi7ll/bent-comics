import React from 'react';
import { Link, withRouter } from 'react-router-dom';
import { connect } from 'react-redux';

const AsideNav = ({ auth, location }) => {
  const { data } = auth;

  const activeLinks = link => {
	return location.pathname.includes(link) ? 'active' : '';
  }

  return (
	<aside className="main-sidebar" style={{ position: 'fixed' }}>

	  {/* sidebar: style can be found in sidebar.less */}
	  <section className="sidebar">

		{/* Sidebar user panel (optional) */}
		<div className="user-panel">
		  <div className="pull-left image">
			<img
			  src={ '/img/' + data.picture }
			  className="img-circle"
			  alt={ data.name }
			/>
		  </div>
		  <div className="pull-left info">
			<p>{ data.name }</p>
			{/* Status */}
			<a href={'mailto:' + data.email }>
			  <i className="fa fa-circle text-success"></i> { data.email }
			</a>
		  </div>
		</div>

		{/* search form (Optional) */}
		<form action="#" method="get" className="sidebar-form">
		  <div className="input-group">
			<input type="text" name="q" className="form-control" placeholder="Search..." />
			<span className="input-group-btn">
				<button type="submit" name="search" id="search-btn" className="btn btn-flat"><i className="fa fa-search"></i>
				</button>
			  </span>
		  </div>
		</form>
		{/* /.search form */}

		{/* Sidebar Menu */}
		<ul className="sidebar-menu" data-widget="tree">
		  <li className="header">MENU</li>
		  {/* Optionally, you can add icons to the links */}
		  <li className={ activeLinks('/admin/dashboard') }>
			<Link to="/admin/dashboard">
			  <i className="fa fa-tachometer" aria-hidden="true"></i> <span>Dashboard</span>
			</Link>
		  </li>
		  <li className={ activeLinks('/admin/comics') }>
			<Link to="/admin/comics">
			  <i className="fa fa-link"></i> <span>Comic Lists</span>
			</Link>
		  </li>
		  <li className={ ['treeview', activeLinks('/admin/genre')].join(' ') }>
			<Link to="#"><i className="fa fa-link"></i> <span>Multilevel</span>
			  <span className="pull-right-container">
				  <i className="fa fa-angle-left pull-right"></i>
				</span>
			</Link>
			<ul className="treeview-menu">
			  <li><a href="#">Link in level 2</a></li>
			  <li><a href="#">Link in level 2</a></li>
			</ul>
		  </li>
		  <li className="header">ACCOUNT</li>
		  <li className={ activeLinks('/admin/profile') }>
			<Link to="/admin/profile">
			  <i className="fa fa-user"></i> <span>Profile</span>
			</Link>
		  </li>
		  <li>
			<a href="/logout">
			  <i className="fa fa-sign-out"></i> <span>Logout</span>
			</a>
		  </li>
		</ul>
		{/* /.sidebar-menu */}
	  </section>
	  {/* /.sidebar */}
	</aside>
  );
}

export default withRouter(
  connect(
	props => props
  )(AsideNav)
);

import React from 'react';
import { Route, Switch, Redirect, withRouter } from 'react-router-dom';

import Dashboard from './pages/Dashboard';
import NotFound from './pages/NotFound';
import Profile from './pages/Profile';

const Main = ({ location }) => {
  return (
	<MainWrapper
	  title={ location.pathname.split('/').pop() }
	  location={ location }
	>
	  <Switch>
		<Route path="/admin/dashboard" component={Dashboard} />
		<Route path="/admin/comics" />
		<Route path="/admin/profile" component={Profile} />

		<Route exact path="/admin" render={() => (
		  <Redirect to="/admin/dashboard" />
		)} />

		<Route component={NotFound} />
	  </Switch>
	</MainWrapper>
  );
}

const MainWrapper = ({ children, title, location }) => {

  console.log(location.pathname.split('/').pop());

  return (
	<div className="content-wrapper">
	  <section className="content-header">
		<h1
		  style={{
			textTransform: 'capitalize'
		  }}
		>
		  { title }
		  <small>Current status</small>
		</h1>
		<ol className="breadcrumb">
		  <li><a href="#"><i className="fa fa-dashboard"></i> Level</a></li>
		  <li className="active">Here</li>
		</ol>
	  </section>

	  <section
		className="content container-fluid"
		style={{
		  marginTop: '1rem'
		}}
	  >

		{ children }

	  </section>
	</div>
  );
}

export default withRouter(Main);

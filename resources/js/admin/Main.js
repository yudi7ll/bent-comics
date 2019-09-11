import React from 'react';
import { Route, Switch, Redirect } from 'react-router-dom';

import Dashboard from './main/Dashboard';
import NotFound from './main/NotFound';

const Main = () => (
  <Switch>
	<Route path="/admin/dashboard" component={Dashboard} />
	<Route path="/admin/comics" />

	<Route exact path="/admin" render={() => (
	  <Redirect to="/admin/dashboard" />
	)} />

	<Route component={NotFound} />
  </Switch>
);

export default Main;

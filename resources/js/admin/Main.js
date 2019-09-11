import React from 'react';
import { Route, Switch, Redirect } from 'react-router-dom';

import Dashboard from './components/Dashboard';

const Main = () => (
  <Switch>
	<Route path="/admin/dashboard" component={Dashboard} />
	<Route path="/admin/comics" />
	<Redirect from="/" to="/admin/dashboard" />
  </Switch>
);

export default Main;

import React from 'react';
import { BrowserRouter } from 'react-router-dom';

import Nav from './Nav';
import Main from './Main';
import AsideNav from './AsideNav';
import AsideBar from './AsideBar';
import Footer from './Footer';

class Admin extends React.Component {
  constructor(props) {
	super(props);
  }

  render() {
	return (
	  <BrowserRouter>
		<Nav />
		<AsideNav />
		<Main />
		<AsideBar />
		<Footer />
	  </BrowserRouter>
	);
  }
}

export default Admin;

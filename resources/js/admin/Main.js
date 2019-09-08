import React, { useState, useEffect } from 'react';

const MainWrapper = ({ children }) => {
  const [pic, setPic] = useState('default.png');

  axios.get('/api/user')
	.then(res => {
	  console.log(res.data);
	});



  return (
	<div className="content-wrapper">
	  {/* Content Header (Page header) */}
	  <section className="content-header">
		<h1>
		  Page Header
		  <small>Optional description</small>
		</h1>
		<ol className="breadcrumb">
		  <li><a href="#"><i className="fa fa-dashboard"></i> Level</a></li>
		  <li className="active">Here</li>
		</ol>
	  </section>

	  {/* Main content */}
	  <section className="content container-fluid">

		{ children }

	  </section>
	  {/* /.content */}
	</div>
  );
}

const Main = () => {
  return (
	<MainWrapper>
	  <h1>Admin Panel</h1>
	</MainWrapper>
  );
}


export default Main;

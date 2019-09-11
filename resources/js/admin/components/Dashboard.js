import React from 'react';

const Wrapper = ({ children }) => {

  return (
	<div className="content-wrapper">
	  <section className="content-header">
		<h1>
		  Dashboard
		  <small>Current status</small>
		</h1>
		<ol className="breadcrumb">
		  <li><a href="#"><i className="fa fa-dashboard"></i> Level</a></li>
		  <li className="active">Here</li>
		</ol>
	  </section>

	  <section className="content container-fluid">

		{ children }

	  </section>
	</div>
  );
}

const Dashboard = () => {
  return (
	<Wrapper>
	  <h1>Dashboard Page</h1>
	</Wrapper>
  );
}

export default Dashboard;

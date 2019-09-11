import React from 'react';

const MainWrapper = ({ children, title }) => {

  return (
	<div className="content-wrapper">
	  <section className="content-header">
		<h1>
		  { title }
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

export default MainWrapper;

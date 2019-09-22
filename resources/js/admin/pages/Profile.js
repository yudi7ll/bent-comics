import React, {useState} from 'react';
import { connect } from 'react-redux';

const Profile = ({ auth }) => {
  const { data, isLoading, fetchFail } = auth;

  if (isLoading) {
	return (
	  <h2>Loading ...</h2>
	);
  }

  if (fetchFail) {
	return (
	  <h4 className="text-danger">
		Failed to retreive data. 
		<button
		  className="btn btn-link"
		  onClick={() => document.location.reload()}
		>
		  Refresh
		</button>
	  </h4>
	);
  }

  return (
	<>
	<div
	  className="alert alert-danger"
	  style={ data.email_verified_at && {
		display: 'none'
	  }}
	  role="alert"
	>
		<b>Warning!</b> Your email isn't verified yet. click&nbsp;
		<a href="#"><b>verify</b></a> to verify your email now.
	</div>
	<div className="row">
	  <Form
		data={data}
	  />
	</div>
	</>
  );
}

const Form = ({ data }) => {
  // Input Form
  let idktp,
	email,
	birth_date;
  const [isDisabled, setIsDisabled] = useState(true);
  const [errors, setErrors] = useState({
	idktp: null,
	email: null,
	birth_date: null
  });

  const submitHandler = async e => {
	e.preventDefault();

	const resp = await axios.put('/api/user?api_token=' + _apiToken.params.api_token, {
		idktp: idktp.value,
		email: email.value,
		birth_date: birth_date.value 
	  }
	);

	// if errors
	if (typeof resp.data == 'object'
	  && resp.data !== true
	) {
	  return setErrors(Object.assign({}, errors, resp.data));
	}

	alert('Data Saved Successfully!');
	document.location.reload();
  }

  const pictureHandler = e => {
	e.preventDefault();
	console.log('Picture Upload');
  }

  return (
	<>
	<div className="col-sm-5">
	  <form
		style={{
		  borderRight: '1px solid #999',
		  paddingRight: '1.5rem'
		}}
		onSubmit={submitHandler}
	  >
		<button
		  type="button"
		  className={"btn btn-link"}
		  style={{
			display: isDisabled ? 'block' : 'none',
			marginLeft: 'auto'
		  }}
		  onClick={() => setIsDisabled(false)}
		  disabled={!isDisabled}
		>
		  {isDisabled ? 'Allow Editing' : 'Editing Allowed'}
		</button>
		<div className={["form-group", errors.idktp && 'has-error'].join(' ')}>
		  <label htmlFor="idktp">ID. KTP</label>
		  <input
			type="text"
			className="form-control"
			id="idktp"
			ref={e => idktp = e}
			disabled={isDisabled}
			defaultValue={data.idktp}
		  />
		  <small className="text-danger">{errors.idktp}</small>
		</div>
		<div className={["form-group", errors.email && 'has-error'].join(' ')}>
		  <label htmlFor="email">Email</label>
		  <input
			type="email"
			className="form-control"
			id="email"
			ref={e => email = e}
			disabled={isDisabled}
			defaultValue={data.email}
		  />
		  <small className="text-danger">{errors.email}</small>
		</div>
		<div className={["form-group", errors.birth_date && 'has-error'].join(' ')}>
		  <label htmlFor="birth_date">Birth Date</label>
			<input
			  type="date"
			  className="form-control"
			  id="birth_date"
			  ref={e => birth_date = e}
			  defaultValue={data.birth_date}
			  disabled={isDisabled}
			  placeholder={data.birth_date + ' (Leave Unchanged)'}
			/>
		  <small className="text-danger">{errors.birth_date}</small>
		</div>
		<button
		  type="submit"
		  className="btn btn-info"
		  title="Save changes"
		  style={{
			marginRight: '1rem'
		  }}
		  disabled={isDisabled}
		>
		  <i className="fa fa-save"></i> Save
		</button>
		<button
		  type="button"
		  className="btn btn-danger"
		  title="Prevent any change"
		  onClick={() => document.location.reload()}
		  disabled={isDisabled}
		>
		  <i className="fa fa-ban"></i> Cancel
		</button>
	  </form>
	</div>
	<div className="col-sm-2 col-sm-offset-1">
	  <img
		src={ '/img/' + data.picture }
		className="img-responsive img-circle"
		alt={data.picture}
	  />
	  <div className="form-group">
		<label htmlFor="profile-picture">Upload Picture</label>
		  <input
			type="file"
			id="profile-picture"
			onChange={pictureHandler}
		  />
		<p className="help-block">Change your profile picture.</p>
	  </div>
	</div>
	</>
  );
}

export default connect(
  props => props
)(Profile);

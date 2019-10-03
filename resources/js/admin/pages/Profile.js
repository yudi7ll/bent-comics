import React, {useState} from 'react';
import { connect } from 'react-redux';
import Croppie from 'croppie';
import PropTypes from 'prop-types';

const Profile = ({ auth }) => {
	const { data, isLoading, fetchFail } = auth;

	// LOADING SCREEN
	if (isLoading) {
		return (
			<h2>Loading ...</h2>
		);
	}

	// ERROR SCREEN
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
            <div className="col-sm-5">

                <PersonalForm
                    data={data}
                />

            </div>

            <div className="col-sm-2 col-sm-offset-1">
                <img
                    src={ '/storage/img/' + data.picture }
                    className="img-responsive img-circle"
                    alt={data.picture}
                />
                <div className="form-group">
                    <label htmlFor="profile-picture">Update Photo</label>

                        <ProfilePictureForm
                            data={data}
                        />

                    <p className="help-block">Max size 2MB</p>
                </div>
            </div>
        </div>
		</>
	);
}

const PersonalForm = ({ data }) => {
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

    const submitHandler = e => {
        e.preventDefault();

        const url = '/api/user?api_token=' + _apiToken.params.api_token;
        const data = {
            idktp: idktp.value,
            email: email.value,
            birth_date: birth_date.value
          }


        axios.put(url,data)
            .then(resp => {
                alert(resp.data);
                document.location.reload();
            })
            .catch(err => {
                setErrors(err.response.data.errors);
            });
    }

    return (
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
    );
}

const ProfilePictureForm = () => {

    const [error, setError] = useState(null);

    const pictureHandler = e => {
        e.preventDefault();

        const url = `/api/user/picture?api_token=${_apiToken.params.api_token}`;
        const formData = new FormData();
        formData.append('picture', e.target[0].files[0]);

        axios.post(url, formData)
            .then(() => {
                document.location.reload();
            })
            .catch(err => {
                alert(
                    err.response.data.errors.picture[0]
                    + '\nPlease choose another file or try again'
                );
                setError(err.response.data.errors.picture[0])
            });
    }

    const chooseFileOnChange = e => {
        setError(null);

        debugger;
    }

    return (
        <form
            encType="multipart/form-data"
            action="#"
            method="post"
            onSubmit={pictureHandler}
        >
            <input
                type="file"
                name="picture"
                required={true}
                onChange={chooseFileOnChange}
            />
            <button
                type="submit"
                className={"btn btn-primary"}
                style={{
                      marginTop: '1rem'
                }}
                title="Upload Selected Image"
                disabled={error}
            >
                <i className="fa fa-upload"></i>&nbsp;
                Upload
            </button>
        </form>
    );
}

Profile.propTypes = {
    auth: PropTypes.object,
}

export default connect(
    props => props,
)(Profile);

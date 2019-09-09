'use strict'; 

const FETCH_AUTH_LOADING = 'FETCH_AUTH_LOADING';
const FETCH_AUTH_FAIL = 'FETCH_AUTH_FAIL';
const FETCH_AUTH_SUCCESS = 'FETCH_AUTH_SUCCESS';

const fetchAuthSuccess = auth => ({
  type: FETCH_AUTH_SUCCESS,
  auth
});

const fetchAuthFail = {
  type: FETCH_AUTH_FAIL
}

const isLoading = {
  type: FETCH_AUTH_LOADING
}

const fetchAuth = () => dispatch => {
  dispatch(isLoading);
  axios.get('/api/user', _apiToken)
	.then(resp => dispatch(fetchAuthSuccess(resp.data)))
	.catch(() => dispatch(fetchAuthFail));
}

export default fetchAuth;

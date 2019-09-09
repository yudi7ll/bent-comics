'use strict';

const auth = (state = {
  isLoading: false,
  fetchFail: false,
  data: {}
}, action) => {
  switch (action.type) {
	case 'FETCH_AUTH_LOADING':
	  return Object.assign({}, state, {
		isLoading: true,
		fetchFail: false
	  });

	case 'FETCH_AUTH_FAIL':
	  return Object.assign({}, state, {
		isLoading: false,
		fetchFail: true,
	  });

	case 'FETCH_AUTH_SUCCESS':
	  return Object.assign({}, state, {
		isLoading: false,
		fetchFail: false,
		data: action.auth
	  });

	default:
	  return state;
  }
}

export default auth;

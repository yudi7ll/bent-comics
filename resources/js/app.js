import React from 'react';
import { render } from 'react-dom';
import { Provider } from 'react-redux';
import { createStore, applyMiddleware } from 'redux';
import thunkMiddleware from 'redux-thunk';

import App from './admin';
import reducers from './reducers';
import { fetchAuth } from './actions';
import './bootstrap';
import './adminlte';

const store = createStore(
  reducers,
  applyMiddleware(
	thunkMiddleware
  )
);

store.subscribe(() => console.log(store.getState()));

store.dispatch(fetchAuth());

render(
  <Provider store={store}>
	<App />
  </Provider>,
  document.getElementById('react-app')
);

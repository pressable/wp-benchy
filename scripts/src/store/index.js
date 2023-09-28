import { createReduxStore, register } from '@wordpress/data';

import * as actions from './actions';
import * as selectors from './selectors';
import reducer from './reducer';
import * as resolvers from './resolvers';
import * as controls from './controls';

const store = createReduxStore('benchy', {
    reducer,
    actions,
    selectors,
    resolvers,
    controls
});

register(store);

export { store };
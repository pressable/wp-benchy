import * as actions from './actions';

export function *getModules() {
    const modules = yield actions.fetchModules();
    return actions.setModules(modules);
}
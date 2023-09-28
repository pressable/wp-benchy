export function getModules(state) {
    return state.modules;
}

export function getModule(state, moduleId) {
    return state.modules[moduleId];
}

export function getModuleConfig(state, moduleId, optionId) {
    return state.modules[moduleId].options[optionId];
}

export function getModuleConfigValue(state, moduleId, optionId) {
    return state.modules[moduleId].options[optionId].value;
}

export function getTestInProgress(state) {
    return state.testInProgress;
}

export function getTestResults(state) {
    return state.testResults;
}

export function getModuleTestResults(state, moduleId) {
    if ( Array.isArray( state.testResults[moduleId] ) ) {
        return state.testResults[moduleId];
    }

    return [];
}

export function getAverageResult(state, moduleId) {
    console.log(state.testResults);
    if (state.testResults[moduleId] && state.testResults[moduleId].length > 0) {
        let total = 0;
        state.testResults[moduleId].forEach((result) => {
            total += result.total;
        });
        return total / state.testResults[moduleId].length;
    }
    return false;
}
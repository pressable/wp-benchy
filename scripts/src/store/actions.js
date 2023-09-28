export function setModules(modules) {
    return {
        type: 'SET_MODULES',
        modules,
    };
}

export function setModuleConfig(moduleId, optionId, optionValue) {
    return {
        type: 'SET_MODULE_CONFIG',
        moduleId,
        optionId,
        optionValue,
    };
}

export function setTestInProgress(testInProgress) {
    return {
        type: 'SET_TEST_IN_PROGRESS',
        testInProgress,
    };
}

export function setTestResults(testResults) {
    return {
        type: 'SET_TEST_RESULTS',
        testResults,
    };
}

export function addTestResult(moduleId, testResult) {
    return {
        type: 'ADD_TEST_RESULT',
        moduleId,
        testResult,
    };
}

export function setModuleTestResults(moduleId, testResults) {
    return {
        type: 'SET_MODULE_TEST_RESULTS',
        moduleId,
        testResults,
    };
}

export function fetchModules() {
    return {
        type: 'FETCH_MODULES',
    };
}

export function runModule(moduleId) {
    return {
        type: 'RUN_MODULE',
        moduleId,
    };
}
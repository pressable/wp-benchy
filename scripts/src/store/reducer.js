const DEFAULT_STATE = {
    modules: {},
    testInProgress: false,
    testResults: {},
};

export default function reducer(state = DEFAULT_STATE, action) {
    switch (action.type) {
        case 'SET_MODULES':
            return {
                ...state,
                modules: action.modules,
            };
        case 'SET_MODULE_CONFIG':
            state.modules[action.moduleId].options[action.optionId].value = action.optionValue;
            return {
                ...state,
                modules: state.modules,
            };
        case 'SET_TEST_IN_PROGRESS':
            return {
                ...state,
                testInProgress: action.testInProgress,
            };
        case 'SET_TEST_RESULTS':
            return {
                ...state,
                testResults: action.testResults,
            };
        case 'ADD_TEST_RESULT':
            const newState = state;

            if ( newState.testResults[action.moduleId] === undefined ) {
                newState.testResults[action.moduleId] = [];
            }

            newState.testResults[action.moduleId].push(action.testResult);
            return {
                ...state,
                testResults: newState.testResults,
            };
        case 'SET_MODULE_TEST_RESULTS':
            return {
                ...state,
                testResults: {
                    ...state.testResults,
                    [action.moduleId]: action.testResults,
                },
            };
        default:
            return state;
    }
}
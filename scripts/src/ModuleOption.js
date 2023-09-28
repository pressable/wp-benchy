import { useSelect, useDispatch } from '@wordpress/data';
import { store as benchyStore } from './store';
import { RangeControl } from '@wordpress/components';

const ModuleOption = ({ moduleId, optionId }) => {

    const { moduleConfig } = useSelect(select => ({
        moduleConfig: select( benchyStore ).getModuleConfig(moduleId, optionId),
    }));

    const { setModuleConfig } = useDispatch( benchyStore );

    const onChange = (value) => {
        setModuleConfig(moduleId, optionId, value);
    };

    return (
        <div className='benchy-module-option'>
            {optionId === 'iterations' && (
                <RangeControl
                    label='Iterations'
                    onChange={onChange}
                    min={moduleConfig.min}
                    max={moduleConfig.max}
                    resetFallbackValue={1}
                    initialPosition={1}
                />
            )}

        </div>
    );
};

export default ModuleOption;
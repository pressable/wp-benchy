import {
    Card,
    CardHeader,
    CardBody,
    CardFooter,
    __experimentalSpacer as Spacer,
    __experimentalHeading as Heading,
    Button,
    CardDivider,
} from '@wordpress/components';

import apiFetch from '@wordpress/api-fetch';
import { useSelect } from '@wordpress/data';
import { store as benchyStore } from './store';
import ModuleOption from './ModuleOption.js';
import React, { useState } from 'react';
import TestResults from './TestResults';

const ModuleCard = ({ moduleId }) => {

    const { module } = useSelect(select => ({
        module: select( benchyStore ).getModule(moduleId),
    }));

    const [results, setResults] = useState([]);

    const runTest = (moduleId) => {
        const moduleOptions = module.options;

        let res = [];
        (async function () {
            for ( let i = 0; i < moduleOptions.iterations.value; i++ ) {
                res.push( await sendRequest(moduleId));
            }

            setResults(res);
        })();
    }

    const sendRequest = async (moduleId) => {
        const response = await apiFetch({ path: `/wp-benchy/v1/module/${moduleId}` });
        return response;
    }

    return (
        <Card className='benchy-module-card'>
            <CardHeader>
                <Heading level={2}>{module.title}</Heading>
            </CardHeader>

            <CardBody>
                <p className='benchy-module-description'>
                    {module.description}
                </p>

                <CardDivider />

                <div className='benchy-module-options'>
                    <Heading level={3}>Options</Heading>

                    {Object.keys(module.options).map((optionId, i) => {
                        return (
                            <ModuleOption moduleId={module.id} optionId={optionId} />
                        );
                    })}
                </div>
            <Spacer>
                <TestResults results={results} />
            </Spacer>
            </CardBody>

            <CardFooter>
                <Button className='run-test-button' text='Run Test' variant='primary' onClick={() => runTest(moduleId)} />
            </CardFooter>
        </Card>
    );
}

export default ModuleCard;
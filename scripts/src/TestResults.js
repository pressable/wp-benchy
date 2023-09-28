import { __experimentalHeading as Heading } from '@wordpress/components';

const TestResults = ({results}) => {

    if ( ! results.length > 0 ) {
        return null;
    }

    return (
        <div className="test-results">
            <Heading level={3}>Results</Heading>
            <ul>
                {results.map((result, i) => {
                    return (
                        <li key={i}>
                            Iteration {i}: {result.total}ms
                        </li>
                    );
                })}
            </ul>
            {results.length > 0 &&
                <p>Average: {results.reduce((a, b) => a + b.total, 0) / results.length}ms</p>
            }
            
        </div>
    );
}

export default TestResults;
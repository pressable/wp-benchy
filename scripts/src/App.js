import {
    __experimentalGrid as Grid,
    __experimentalHeading as Heading,
} from '@wordpress/components';

import { useSelect } from '@wordpress/data';
import { store as benchyStore } from './store';
import ModuleCard from './ModuleCard.js';

const App = () => {

    const { modules } = useSelect(select => ({
        modules: select( benchyStore ).getModules(),
    }));

    return (
        <div>
          <Heading level={1}>Pressable Benchy Test Suite</Heading>

          <Grid columns={2}>

            {Object.keys(modules).map((moduleId, i) => {
                return (
                    <ModuleCard moduleId={moduleId} />
                );
            })}

          </Grid>
        </div>
  
    );
  
  };

export default App;
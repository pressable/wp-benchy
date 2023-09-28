const {render} = wp.element;
import App from './App';

if (document.getElementById('wp-benchy-settings')) {
    render(<App/>, document.getElementById('wp-benchy-settings'));
}
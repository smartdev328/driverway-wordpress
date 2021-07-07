// import external dependencies

import "jquery"

// Import everything from autoload
import "./autoload/**/*"
import "./modules/_navbar";
import toggleSearch from './modules/search-form';


jQuery(document).ready(() => {
	toggleSearch();
});

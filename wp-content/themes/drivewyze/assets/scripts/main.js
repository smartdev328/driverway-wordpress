// import external dependencies

import "jquery"

// Import everything from autoload
import "./autoload/**/*"

// Import from modules
import "./modules/_navbar";
import toggleSearch from './modules/search-form';
import posts from "./modules/blog"
import sliders from "./modules/slider"

jQuery(document).ready(() => {
    toggleSearch();
    posts.select()
	sliders.init()
})

// import external dependencies

import "jquery"

// Import everything from autoload
import "./autoload/**/*"
import "./modules/navbar";
import "./modules/toggle-header";
import toggleSearch from './modules/search-form';
import posts from "./modules/blog"
import sliders from "./modules/slider"

jQuery(document).ready(() => {
    toggleSearch();
    posts.select()
	sliders.init()
})

// import external dependencies

import "jquery"
import AOS from 'aos';

// Import everything from autoload
import "./autoload/**/*"
import "./modules/navbar";
import "./modules/toggle-header";
import "./modules/fancybox";
import "./modules/scroll-down";
import "./modules/share-buttons";
import "./modules/forms";
import toggleSearch from './modules/search-form';
import posts from "./modules/blog"
import sliders from "./modules/slider"

jQuery(document).ready(() => {
    toggleSearch();
    posts.select();
    posts.load_more();
	sliders.init();

	//Init Aos animation
    AOS.init();
});

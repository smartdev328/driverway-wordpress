// import external dependencies

import "jquery"

// Import everything from autoload
import "./autoload/**/*"

// Import everything form modules
import  "./modules/**/*"

// Import export consts form modules
import  sliders from "./modules/slider"

jQuery(document).ready(() => {
	sliders.init()
})

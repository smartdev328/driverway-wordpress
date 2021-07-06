// import external dependencies

import "jquery"

// Import everything from autoload
import "./autoload/**/*"
import posts from "./modules/blog"

jQuery(document).ready(() => {
    posts.select()
});

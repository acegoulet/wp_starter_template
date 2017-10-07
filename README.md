# Wordpress Starter Theme
This sass-based WP template is meant to serve as a very stripped-down, light-weight starter. 

# Documentation
https://www.acegoulet.com/wordpress-starter-theme/

### Favicons and App Icons
There are a bunch of default browser favicons and app icons included in the theme. Be sure to update these. Best resource: https://realfavicongenerator.net/

### GULP Setup
Run `npm install` on the theme directory then run `gulp`. All your Sass and JS assets should now be continuously watched and recompiled whenever you make changes. Look at the example files in `/js` and `/sass`. Everything should be pretty straightforward. Assets get compiled to `/script.js`, `/script-min.js`  and `/style.css`. Remember to link your vendor and lib scripts and any additional js files in the js/main.js file in order for them to be included when the file is compiled.
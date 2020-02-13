# Build a web server and using the Cookie and Session

## Precondition
1. You have to finish previous section [1. HTML, CSS and JavaScript](./../docs/html-cs-js/readme.md). Because in this exercise, you have to reuse that layout.

2. You do below excerise to add the login form and login bar as the images.

![login bar](./images/tut2-login-bar.png)

![login form](./images/tut2-login-form.png)

### Required
By default, The login form will be hidden, when the user clicks on the text `Login` on the top-right corner, the login form will be displayed.

## Guide
- Split the `search` column that you make from previous step (html-css-js) become 2 rows. The first row includes login bar, the 2nd is search form.
- Use `position: absolute;` to fixed the search form at a position on a screen.
- Structure login bar like nav bar (menu) by using `<ul>` tag.
- After finished styling the login form, set `display: none` to hide the form.
- binding `onclick` event to the text `Login` (`<a>` tag) with a method that you defined to handle to show the login form.
- when user click out of range of the login form then hide the login form.


> Please try by yourself first before you reference the source code.

# Build web server.


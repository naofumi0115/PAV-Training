# Overview
localStorage is a new JavaScript API in HTML5 that allows us to save data in key/value pairs in a user's browser.

localStorage has a little bit similar with Cookie, except:
- Cookies expire and get cleared a lot, localStorage is forever (until explicitly cleared).
- localStorage isn't sent along in HTTP Requests, you have to ask for it.
- You can store way `more data` (at least 5MB) in localStorage than you can in cookies.

Forgot the cookie? check again [Cookie - Session](../cookie-session/readme.md)

Web Storage have also supply us 2 kind of storage: localStorage (store forever until you or user delete it) and sessionStorage (on session only, when close tab, its data lost)

Check [here](https://www.w3schools.com/html/html5_webstorage.asp) to get detail

# When / When not to use Web storage
## When to use:
- Want to store more data that the cookie can not.
- Want to save data until you (your code logic) or user delete it.
- Want you data data does not automatically send along with http request
-

## When NOT to use:
- Want to save the sensitive information
  - User IDs
  - Session IDs
  - JWTs
  - Personal information
  - Credit card information
  - API keys
  - And anything else you wouldn’t want to publicly share on Facebook

Check more [here](https://www.rdegges.com/2018/please-stop-using-local-storage/)

# How to use localStorage
- [Web Storage](https://www.w3schools.com/html/html5_webstorage.asp)
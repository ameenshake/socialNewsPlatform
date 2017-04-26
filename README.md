# MyDiscussionForum - Hacker News / Reddit inspired discussion website

Demo [here](https://dry-harbor-68054.herokuapp.com/index.php).

## FEATURES

- User Accounts ✔
- Comments updated asynchronously ✔
- Built with modern PHP ✔
- Custom implementation of MVC without any server-side framework ✔
- Clean and well commented code ✔
- JavaScript written in ES6 ✔

## How it works

Each request goes through `index.php`, which passes it to `routes.php`. This files contains functions to process the request and pass it to the correct controller. The controller then takes the data and executes the action that was requested.

The file `db.php` stores the database connection information.

The file `js/ajax.js` is used to fetch and update comments asynchronously. It runs a loop, refreshing every 5 seconds to query the database for any new comments.

## Missing features

- Client side and server side validation for empty fields
- User account shows user's comment and post history
- Categories

## Future Plans

- SPA with Vue or React
- Twig support
- Replacing jQuery with vanilla JavaScript
- Better routing support
- Responsive for mobile

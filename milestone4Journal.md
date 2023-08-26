# Journal of Work for Completing Project Milestone 4
## Brett McGee

Wednesday - 8/23/23
Today, I came up with my plans for what I wanted to add as my additional feature. I decided to create a frontend that allows users to interact with my database by looking up beers


Saturday - 8/26/23
Today, I decided to expand my website to include an additional feature: granting users access to the complete transactions table after they go through an authentication process. For the authentication process, I used this [tutorial](https://www.simplilearn.com/tutorials/php-tutorial/php-login-form) to learn about authentication and creating a PHP login page. I worked in Thayer from the hours of 12 PM to 5:30 PM implementing this. I was able to create my `login.html` file relatively easily. However, there was just one problem, where was I going to store the username and password data needed to check against the inputed username and password. To solve this, I went onto my AWS RDS and created another schema called `auth` with one table `userandpw` which I inserted one username and password into. I also adjusted the permissions of my mysql `brett` user (set up to be used remotely by `mysqli`) so that it could only read to this table. Now that I had something to check the username and password against, I created my `login.php` file which used `mysqli` to query the `auth` schema and check that the inputted username and password were valid. If it was a valid login `username: exampleUser` and `password: DB23X` then it would redirect the user to the `transactionsGive.php` page that displays the entire table of transactions.

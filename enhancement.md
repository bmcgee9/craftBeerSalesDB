# Enchancement - Creating a Frontend
## Brett McGee

For my enhancement, I created a complete frontend for my database that allows users to query in multiple ways. </br>
Here is a picture of the homepage `index.html`:</br>
![image](https://github.com/bmcgee9/craftBeerSalesDB/assets/102620872/4a611048-2e65-452c-8408-23d1f983193b)
</br>
There are a few pages (each one using a complex combination of html, CSS and PHP), the home page, about page, and Transactions Tables page (links to each are compiled in the navigation bar).
</br>
### Home Page
On this home page, there are two main features. One is the first search box where you can search for details on your favorite craft beer by its name (or just part of its name). In order to use this feature, you must type in the name of the craft beer like this: </br>
![image](https://github.com/bmcgee9/craftBeerSalesDB/assets/102620872/4f67e419-a40d-47d1-8eb1-63a292ec3430)
</br>
Then you press the submit button directly right of the search field and you will be taken to a table showing the details of the craft beer that you searched for. This is done by submitting a POST request to the `beerLookup.php` script that interacts with my `craftbeerdb` using `mysqli` and prepared statements which protect against a SQL injection attack. The results page is very easy to navigate with a standard scroll bar and a visually pleasing layout and color scheme. The row you hover on even becomes highlighted!</br>
![image](https://github.com/bmcgee9/craftBeerSalesDB/assets/102620872/e51c2be1-c489-4dc5-80bc-85a2f7a41925)
</br>
The other main feature on this homepage is the second search option, where you can select a country from the dropdown box and search for all the craft beer vendors that come from the inputted country. </br>
![image](https://github.com/bmcgee9/craftBeerSalesDB/assets/102620872/b7a8285a-36c8-458d-be70-5ef200c33ba3)
</br>
After you have selected your desired country, just press the "submit" button and you will recieve a well formatted table that contains all of the vendors/breweries that are from the inputted country. Similarly to the first main feature, this is accomplished by submitting a POST request to a `countryLookup.php` script that interacts with the vendors table of craftbeerdb using `mysqli` and prepared statements (note: prepared statements are necessary in this situation, but I still used them).</br>
![image](https://github.com/bmcgee9/craftBeerSalesDB/assets/102620872/6c983cbf-986f-4fff-9a96-8b6ba25fe41e)
</br>
### About Page
The about page is home to a quick introduction to my project. The most important part is that it contains a hyperlink to my repository, where the user can access all of my documentation on the project. </br>
![image](https://github.com/bmcgee9/craftBeerSalesDB/assets/102620872/313f2408-c022-4268-8a86-83e69cb205c2)
</br>

### Transactions Table Page
Upon clicking the "Transactions Table" tab in the navigation bar, you are redirected to a login page (`login.html`) which just contains simple username and password text inputs that will get included in a POST request sent to `login.php`. </br>
![image](https://github.com/bmcgee9/craftBeerSalesDB/assets/102620872/a26b117e-29db-40a6-a4cd-f6666b80d3b7)
</br>
The `login.php` file uses `mysqli` to query my `auth` schema in my RDS, which contains a table of allowed usernames and their passwords, to check the validity of the information the user has inputed. Like the earlier mentioned PHP scripts, `login.php` uses prepared statements to protect against SQL injection attacks. The correction login info is `username: exampleUser` and `password: DB23X`. </br>
![image](https://github.com/bmcgee9/craftBeerSalesDB/assets/102620872/fefc2bc2-5581-4404-b9f9-41df1ab30858)
</br>
If you enter an invalid username or password, you are redirected back to the home page and if you enter the valid username and password, you are taken to `transactionsGive.php` which generates a massive table of all the transactions involving the craft beers in our database using a relatively simple query that joined the products and transactions tables in `mysqli` . </br>
![image](https://github.com/bmcgee9/craftBeerSalesDB/assets/102620872/f3eeaadb-b90a-47e6-9c07-52d3080c7f4c)
</br>
As you can see, this is a massive table of transactions, and also it includes a button that takes you back to the home page.

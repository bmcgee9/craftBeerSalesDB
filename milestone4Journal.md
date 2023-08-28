# Journal of Work for Completing Project Milestone 4
## Brett McGee

Wednesday - 8/23/23 </br>
Today, I came up with my plans for what I wanted to add as my additional feature. I decided to create a frontend that allows users to interact with my database by looking up beers by name or country. I also started to look into how I wanted to accomplish this, and I decided to just transfer my craftbeerdb on my local computer to the MariaDB running on my already up AWS ec2 instance and build out the existing webserver that the server was hosting.

</br></br>
Thursday - 8/27/23 </br>
Looking back on it, not much progress was made today for the amount of time I spent on it. I spent many hours trying to transfer my db from my local machine to the ec2 server running MariaDB. The first method I tried was following the export data process in mySQL workbench to get a script that can essentially replicate a DB. However, when I tried to run it on the server, there were syntax errors due to the slight differences in mySQL and MariaDB syntax. My next attempt included downloaded all of my CSVs of data to the server and trying to import them into tables in MariaDB, but even though the query worked, none of the data actually got loaded into the tables. This left me pretty stumped as I went back to the drawing board and made a discovery: that my webserver and DB could be on different servers, as long as they are in the same local network (public IPs are constantly changing which would force the user to change the PHP files every time they want to use it). This caused me to start researching about AWS VPCs and how they control the private subnet the servers are on. After learning that I could set up two servers on the same VPC, I decided to follow the guide given to us in the canvas announcement to transfer my DB to an AWS RDS and leave the apache on an ec2.

</br></br>
Friday - 8/26/23 </br>
Today, I worked on this project from 3-5 PM and 7 PM - 4 AM in my room and on FFB of the library. I was able to successfully get my RDS set up after experimenting with VPCs and Security groups the night before. Before going to sleep, I had a working home page that allowed users to query my DB based on product name and vendor country. This was accomplished by creating two different PHP files that can take a POST request from `index.html` and use `mysqli` to connect to my RDS where my craft beer data is stored. Both of these PHP files utilize prepared statements in order to protect against SQL injection attacks. 

</br></br>
Saturday - 8/26/23 </br>
Today, I decided to expand my website to include an additional feature: granting users access to the complete transactions table after they go through an authentication process. For the authentication process, I used this [tutorial](https://www.simplilearn.com/tutorials/php-tutorial/php-login-form) to learn about authentication and creating a PHP login page. I worked in Thayer from the hours of 12 PM to 5:30 PM implementing this. I was able to create my `login.html` file relatively easily. However, there was just one problem, where was I going to store the username and password data needed to check against the inputed username and password. To solve this, I went onto my AWS RDS and created another schema called `auth` with one table `userandpw` which I inserted one username and password into. I also adjusted the permissions of my mysql `brett` user (set up to be used remotely by `mysqli`) so that it could only read to this table. Now that I had something to check the username and password against, I created my `login.php` file which used `mysqli` to query the `auth` schema and check that the inputted username and password were valid. If it was a valid login `username: exampleUser` and `password: DB23X` then it would redirect the user to the `transactionsGive.php` page that displays the entire table of transactions. I also had to go back into my `index.html` and `about.html` to adjust the navigation bar to include the transactions table tab.

</br><br>
Sunday - 8/27/23 </br>
Today, I only spent an hour or two working on the project as I completed task 2, which was just answering the questions that I posed in milestone 1.

</br><br>
Monday - 8/28/23 </br>
Completed and polished up my documentation. Finished the project!

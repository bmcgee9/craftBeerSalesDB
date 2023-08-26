# Documentation for Milestone 4
## Brett McGee

For the first part of milestone 4, I decided to create a frontend for my database which includes, apache website running on an AWS ec2 server, my database running on an AWS RDS server,
and a PHP script connecting the two which queries for additional information using a name-based search of craft beers.

### Issues and Solutions
1. I was having an extremely pesty connection issue between my servers while sending a POST request to the RDS server. I spent hours trying to debug it.
   I first went down the rabbit hole of making sure I was allowing HTTP, SQL(port 3306), and ICMP traffic and eventually all traffic between the two security groups that the servers were in, but this did nothing to help the issue.
   Eventually, after searching through a lot of online forums, I found that the issue was with the version of SELinux (Security Enhanced Linux) that my ec2 server was running not allowing certain connections.
   The solution was to run this line: `setsebool -P httpd_can_network_connect=1`. Here is the [link](https://stackoverflow.com/questions/3407281/mysqli-connect-problem) to the forum I used to solve this issue.

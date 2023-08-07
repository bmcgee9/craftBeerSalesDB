# Database build plan
## Brett McGee

1) In excel, add an order_id column to the transactions table

    Do this by creating the new column, setting the first cell in it to 1 and then create a formula in the next cell down adding 1 to the previous cell and apply it to all         cells in column.
   
2) Review all data in both tables to ensure they have consistent formating
   
3) Import both transactions and products tables using the "Table Data Import Wizard" tool you find after right clicking the schema
   
4) Ensure that product_code and order_id are primary keys in their respective tables

   You will need to use an `ALTER TABLE` statement to set product_code to a primary key

8) Add product_code as a foreign key to the transactions table

   You will need to use an `ALTER TABLE` statement to set product_code to a foreign key
